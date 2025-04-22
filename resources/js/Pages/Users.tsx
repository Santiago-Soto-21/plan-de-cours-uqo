import { useState, useEffect, ChangeEvent, FormEvent } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import axios from "axios";

interface User {
  id: number;
  name: string;
  email: string;
  role: string;
}

interface UsersProps {
  auth: { user: User };
}

export default function Users({ auth }: UsersProps): JSX.Element {
  const [users, setUsers] = useState<User[]>([]);
  const [filteredUsers, setFilteredUsers] = useState<User[]>([]);
  const [searchTerm, setSearchTerm] = useState<string>("");
  const [roleFilter, setRoleFilter] = useState<string>("all");
  const [loading, setLoading] = useState<boolean>(true);
  const [error, setError] = useState<string | null>(null);

  const [modalOpen, setModalOpen] = useState<boolean>(false);
  const [newUser, setNewUser] = useState({
    name: "",
    email: "",
    password: "",
    role: "prof",
  });

  useEffect(() => {
    fetchUsers();
  }, []);

  useEffect(() => {
    filterUsers();
  }, [searchTerm, roleFilter, users]);

  const fetchUsers = async () => {
    try {
      setLoading(true);
      const response = await axios.get<User[]>(route("admin.users.fetch"));
      setUsers(response.data);
      setLoading(false);
    } catch {
      setError("Échec du chargement des utilisateurs.");
      setLoading(false);
    }
  };

  const filterUsers = () => {
    let filtered = [...users];
    if (roleFilter !== "all") {
      filtered = filtered.filter(
        (u) => u.role.toLowerCase() === roleFilter.toLowerCase()
      );
    }

    if (searchTerm.trim() !== "") {
      const term = searchTerm.toLowerCase();
      filtered = filtered.filter(
        (u) =>
          u.name.toLowerCase().includes(term) ||
          u.email.toLowerCase().includes(term)
      );
    }

    setFilteredUsers(filtered);
  };

  const handleAddUser = async (e: FormEvent) => {
    e.preventDefault();
    try {
      await axios.post(route("admin.users.store"), newUser);
      setNewUser({ name: "", email: "", password: "", role: "prof" });
      setModalOpen(false);
      fetchUsers();
    } catch {
      console.error("Erreur lors de l'ajout de l'utilisateur");
    }
  };

  const handleDeleteUser = async (id: number) => {
    if (!confirm("Supprimer cet utilisateur ?")) return;
    try {
      await axios.post(route("admin.users.destroy", { id }));
      fetchUsers();
    } catch {
      console.error("Erreur lors de la suppression");
    }
  };

  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
          Gestion des utilisateurs
        </h2>
      }
    >
      <Head title="Utilisateurs" />

      <div className="py-12">
        <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div className="p-6 text-gray-900 dark:text-gray-100">
              {/* Button to open modal */}
              <div className="mb-6">
                <button
                  onClick={() => setModalOpen(true)}
                  className="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700"
                >
                  Ajouter un utilisateur
                </button>
              </div>

              {/* Search + Filter */}
              <div className="mb-6 flex flex-col space-y-4 md:flex-row md:justify-between md:items-end md:space-y-0">
                <div className="w-full md:w-1/3">
                  <label className="block text-sm font-medium mb-1">Recherche</label>
                  <input
                    type="text"
                    value={searchTerm}
                    onChange={(e) => setSearchTerm(e.target.value)}
                    placeholder="Rechercher par nom ou courriel..."
                    className="w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                  />
                </div>

                <div className="w-full md:w-1/4">
                  <label className="block text-sm font-medium mb-1">Filtrer par rôle</label>
                  <select
                    value={roleFilter}
                    onChange={(e) => setRoleFilter(e.target.value)}
                    className="w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                  >
                    <option value="all">Tous les rôles</option>
                    <option value="Prof">Prof</option>
                    <option value="Secretary">Secretary</option>
                    <option value="Director">Director</option>
                  </select>
                </div>

                <div className="text-sm text-right">
                  {filteredUsers.length}{" "}
                  {filteredUsers.length === 1 ? "utilisateur" : "utilisateurs"}
                </div>
              </div>

              {/* Table */}
              {filteredUsers.length === 0 ? (
                <div className="text-center text-gray-500 py-8">
                  Aucun utilisateur trouvé.
                </div>
              ) : (
                <div className="overflow-x-auto">
                  <table className="min-w-full divide-y divide-gray-300 dark:divide-gray-600">
                    <thead className="bg-gray-100 dark:bg-gray-700">
                      <tr>
                        <th className="px-4 py-3 text-left text-xs font-medium uppercase text-gray-700 dark:text-gray-300">
                          Nom
                        </th>
                        <th className="px-4 py-3 text-left text-xs font-medium uppercase text-gray-700 dark:text-gray-300">
                          Email
                        </th>
                        <th className="px-4 py-3 text-left text-xs font-medium uppercase text-gray-700 dark:text-gray-300">
                          Rôle
                        </th>
                        <th className="px-4 py-3 text-right text-xs font-medium uppercase text-gray-700 dark:text-gray-300">
                          Action
                        </th>
                      </tr>
                    </thead>
                    <tbody className="divide-y divide-gray-200 dark:divide-gray-700">
                      {filteredUsers.map((user) => (
                        <tr
                          key={user.id}
                          className="hover:bg-gray-50 dark:hover:bg-gray-700"
                        >
                          <td className="px-4 py-4 text-sm">{user.name}</td>
                          <td className="px-4 py-4 text-sm">{user.email}</td>
                          <td className="px-4 py-4 text-sm">{user.role}</td>
                          <td className="px-4 py-4 text-sm text-right">
                            <button
                              onClick={() => handleDeleteUser(user.id)}
                              className="text-red-600 hover:underline"
                            >
                              SUPPRIMER
                            </button>
                          </td>
                        </tr>
                      ))}
                    </tbody>
                  </table>
                </div>
              )}

              {/* Modal */}
              {modalOpen && (
                <div className="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
                  <div className="bg-white dark:bg-gray-800 p-6 rounded shadow-lg w-full max-w-md relative">
                    <h3 className="text-lg font-semibold mb-4">Ajouter un utilisateur</h3>
                    <form onSubmit={handleAddUser} className="space-y-4">
                      <div>
                        <label className="block text-sm mb-1">Nom</label>
                        <input
                          type="text"
                          value={newUser.name}
                          onChange={(e) => setNewUser({ ...newUser, name: e.target.value })}
                          className="w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                          required
                        />
                      </div>

                      <div>
                        <label className="block text-sm mb-1">Courriel</label>
                        <input
                          type="email"
                          value={newUser.email}
                          onChange={(e) => setNewUser({ ...newUser, email: e.target.value })}
                          className="w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                          required
                        />
                      </div>

                      <div>
                        <label className="block text-sm mb-1">Mot de passe</label>
                        <input
                          type="password"
                          value={newUser.password}
                          onChange={(e) => setNewUser({ ...newUser, password: e.target.value })}
                          className="w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                          required
                        />
                      </div>

                      <div>
                        <label className="block text-sm mb-1">Rôle</label>
                        <select
                          value={newUser.role}
                          onChange={(e) => setNewUser({ ...newUser, role: e.target.value })}
                          className="w-full rounded-md border-gray-300 shadow-sm dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                        >
                          <option value="prof">Prof</option>
                          <option value="secretary">Secretary</option>
                          <option value="director">Director</option>
                        </select>
                      </div>

                      <div className="flex justify-end space-x-2 pt-2">
                        <button
                          type="button"
                          onClick={() => setModalOpen(false)}
                          className="px-4 py-2 text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded hover:bg-gray-300"
                        >
                          Annuler
                        </button>
                        <button
                          type="submit"
                          className="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700"
                        >
                          Ajouter
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              )}
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
