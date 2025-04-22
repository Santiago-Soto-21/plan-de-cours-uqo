import { useState, useEffect, ChangeEvent } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import axios from "axios";

// Define types
interface User {
  id: number;
  name: string;
  email: string;
}

interface AuthProps {
  user: User;
}

interface RequestRecord {
  id: number;
  status: string;
  filename: string;
  requestor_id: string;
  pdf_path: string;
  secretary_comment: string | null;
  director_comment: string | null;
  created_at: string;
  updated_at: string;
}

interface RequestProps {
  auth: AuthProps;
}

export default function Request({ auth }: RequestProps): JSX.Element {
  const [requests, setRequests] = useState<RequestRecord[]>([]);
  const [filteredRequests, setFilteredRequests] = useState<RequestRecord[]>([]);
  const [loading, setLoading] = useState<boolean>(true);
  const [error, setError] = useState<string | null>(null);
  const [searchTerm, setSearchTerm] = useState<string>("");
  const [statusFilter, setStatusFilter] = useState<string>("all");

  useEffect(() => {
    // Fetch requests data when component mounts
    fetchRequests();
  }, []);

  // Apply filters whenever search term or status filter changes
  useEffect(() => {
    filterRequests();
  }, [searchTerm, statusFilter, requests]);

  const fetchRequests = async (): Promise<void> => {
    try {
      setLoading(true);
      const response = await axios.get<RequestRecord[]>(
        route("requests.index")
      );
      setRequests(response.data);
      setLoading(false);
    } catch (err) {
      setError("Failed to fetch requests data");
      setLoading(false);
      console.error("Error fetching requests:", err);
    }
  };

  const filterRequests = (): void => {
    let result = [...requests];

    // Apply status filter
    if (statusFilter !== "all") {
      result = result.filter(
        (request) => request.status.toUpperCase() === statusFilter.toUpperCase()
      );
    }

    // Apply search term
    if (searchTerm.trim() !== "") {
      const term = searchTerm.toLowerCase();
      result = result.filter(
        (request) =>
          request.filename.toLowerCase().includes(term) ||
          request.requestor_id.toLowerCase().includes(term) ||
          (request.secretary_comment &&
            request.secretary_comment.toLowerCase().includes(term)) ||
          (request.director_comment &&
            request.director_comment.toLowerCase().includes(term))
      );
    }

    setFilteredRequests(result);
  };

  const handleSearch = (e: ChangeEvent<HTMLInputElement>): void => {
    setSearchTerm(e.target.value);
  };

  const handleStatusFilterChange = (
    e: ChangeEvent<HTMLSelectElement>
  ): void => {
    setStatusFilter(e.target.value);
  };

  // Function to determine status color
  const getStatusColor = (status: string): string => {
    const upperStatus = status.toUpperCase();
    if (upperStatus === "APPROUVÉE PAR DIRECTEUR")
      return "text-green-600 font-semibold";
    if (upperStatus === "APPROUVÉE PAR SECRÉTAIRE")
      return "text-yellow-600 font-semibold";
    if (
      upperStatus === "REFUSÉE PAR SECRÉTAIRE" ||
      upperStatus === "REFUSÉE PAR DIRECTEUR"
    )
      return "text-red-600 font-semibold";
    return "text-white-600 font-semibold"; // Default for waiting or other statuses
  };

  // Format date to be more readable
  const formatDate = (dateString: string | null): string => {
    if (!dateString) return "-";
    const date = new Date(dateString);
    return date.toLocaleDateString("fr-CA", {
      year: "numeric",
      month: "short",
      day: "numeric",
      hour: "2-digit",
      minute: "2-digit",
    });
  };

  // Get unique statuses from requests for the filter dropdown
  const getUniqueStatuses = (): string[] => {
    const statuses = requests.map((request) => request.status.toUpperCase());
    return ["all", ...new Set(statuses)];
  };

  const openPdf = (pdf_path: string) => {
    if (!pdf_path) {
      // Handle case where PDF URL is not available
      alert("PDF file is not available");
      return;
    }

    console.log(pdf_path);
    // Open PDF in new tab
    window.open(pdf_path, "_blank");
  };

  return (
    <AuthenticatedLayout
      header={
        <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
          Anciennes demandes
        </h2>
      }
    >
      <Head title="Anciennes demandes" />
      <div className="py-12">
        <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
            <div className="p-6 text-gray-900 dark:text-gray-100">
              {loading ? (
                <div className="flex justify-center py-8">
                  <div className="loader">Chargement des données...</div>
                </div>
              ) : error ? (
                <div className="text-center text-red-500">{error}</div>
              ) : (
                <>
                  {/* Search and Filter Controls */}
                  <div className="mb-6 flex flex-col space-y-4 md:flex-row md:items-end md:justify-between md:space-y-0">
                    <div className="w-full md:w-1/3">
                      <label
                        htmlFor="search"
                        className="mb-1 block text-sm font-medium"
                      >
                        Recherche
                      </label>
                      <input
                        type="text"
                        id="search"
                        value={searchTerm}
                        onChange={handleSearch}
                        placeholder="Rechercher par nom, fichier, demandeur..."
                        className="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                      />
                    </div>

                    <div className="w-full md:w-1/4">
                      <label
                        htmlFor="statusFilter"
                        className="mb-1 block text-sm font-medium"
                      >
                        Filtrer par statut
                      </label>
                      <select
                        id="statusFilter"
                        value={statusFilter}
                        onChange={handleStatusFilterChange}
                        className="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                      >
                        {getUniqueStatuses().map((status) => (
                          <option key={status} value={status}>
                            {status === "all" ? "Tous les statuts" : status}
                          </option>
                        ))}
                      </select>
                    </div>

                    <div className="text-right">
                      <span className="text-sm">
                        {filteredRequests.length}{" "}
                        {filteredRequests.length === 1
                          ? "résultat"
                          : "résultats"}
                      </span>
                    </div>
                  </div>

                  {filteredRequests.length === 0 ? (
                    <div className="py-8 text-center text-gray-500">
                      Aucune demande ne correspond à votre recherche
                    </div>
                  ) : (
                    <div className="overflow-x-auto">
                      <table className="min-w-full divide-y divide-gray-300 dark:divide-gray-600">
                        <thead>
                          <tr className="bg-gray-100 dark:bg-gray-700">
                            <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">
                              ID
                            </th>
                            <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">
                              Statut
                            </th>
                            <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">
                              Nom du fichier
                            </th>
                            <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">
                              Demandeur
                            </th>
                            <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">
                              Date de création
                            </th>
                            <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">
                              Dernière mise à jour
                            </th>
                            <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">
                              Fichier PDF
                            </th>
                          </tr>
                        </thead>
                        <tbody className="divide-y divide-gray-200 dark:divide-gray-700">
                          {filteredRequests.map((request) => (
                            <>
                              <tr
                                key={request.id}
                                className="hover:bg-gray-50 dark:hover:bg-gray-700"
                              >
                                <td className="px-4 py-4 text-sm">
                                  {request.id}
                                </td>
                                <td className="whitespace-nowrap px-4 py-4 text-sm">
                                  <span
                                    className={getStatusColor(request.status)}
                                  >
                                    {request.status.toUpperCase()}
                                  </span>
                                </td>
                                <td className="px-4 py-4 text-sm">
                                  {request.filename}
                                </td>
                                <td className="whitespace-nowrap px-4 py-4 text-sm">
                                  {request.requestor_id}
                                </td>
                                <td className="whitespace-nowrap px-4 py-4 text-sm">
                                  {formatDate(request.created_at)}
                                </td>
                                <td className="whitespace-nowrap px-4 py-4 text-sm">
                                  {formatDate(request.updated_at)}
                                </td>
                                <td className="whitespace-nowrap px-4 py-4 text-sm">
                                  <button
                                    className="rounded-full bg-indigo-100 px-3 py-1 text-xs text-indigo-600 hover:bg-indigo-200"
                                    onClick={(e) => {
                                      e.stopPropagation();
                                      openPdf(request.pdf_path);
                                    }}
                                  >
                                    Ouvrir PDF
                                  </button>
                                </td>
                              </tr>

                              {request.secretary_comment && (
                                <tr
                                  key={`secretary_comment-${request.id}`}
                                  className="bg-gray-50 dark:bg-gray-800"
                                >
                                  <td
                                    colSpan={7}
                                    className="px-6 pb-4 pt-2 text-sm text-gray-700 dark:text-gray-200 italic"
                                  >
                                    <strong>Commentaire du secrétaire:</strong>{" "}
                                    {request.secretary_comment}
                                  </td>
                                </tr>
                              )}

                              {request.director_comment && (
                                <tr
                                  key={`director_comment-${request.id}`}
                                  className="bg-gray-50 dark:bg-gray-800"
                                >
                                  <td
                                    colSpan={7}
                                    className="px-6 pb-4 pt-2 text-sm text-gray-700 dark:text-gray-200 italic"
                                  >
                                    <strong>Commentaire du directeur:</strong>{" "}
                                    {request.director_comment}
                                  </td>
                                </tr>
                              )}
                            </>
                          ))}
                        </tbody>
                      </table>
                    </div>
                  )}
                </>
              )}
            </div>
          </div>
        </div>
      </div>

      {/* PDF Opening Function */}
      <script
        dangerouslySetInnerHTML={{
          __html: `
                    function openPdf(pdfUrl) {
                        if (!pdfUrl) {
                            alert('PDF non disponible');
                            return;
                        }
                        window.open(pdfUrl, '_blank');
                    }
                `,
        }}
      />
    </AuthenticatedLayout>
  );
}
