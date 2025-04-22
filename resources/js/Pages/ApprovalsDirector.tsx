import { useState, useEffect, ChangeEvent, FormEvent } from 'react';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import axios from 'axios';

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
    const [searchTerm, setSearchTerm] = useState<string>('');
    const [expandedRequestId, setExpandedRequestId] = useState<number | null>(null);
    const [directorComment, setDirectorComment] = useState<string>('');
    const [actionLoading, setActionLoading] = useState<boolean>(false);
    const [actionMessage, setActionMessage] = useState<{text: string, type: 'success' | 'error'} | null>(null);
    
    useEffect(() => {
        // Fetch requests data when component mounts
        fetchRequests();
    }, []);

    // Apply filters whenever search term changes
    useEffect(() => {
        filterRequests();
    }, [searchTerm, requests]);

    const fetchRequests = async (): Promise<void> => {
        try {
            setLoading(true);
            const response = await axios.get<RequestRecord[]>(route('requests.index'));
            
            // Filter requests to only include "APPROUVÉE PAR SECRÉTAIRE" status
            const pendingRequests = response.data.filter(request => 
                request.status.toUpperCase() === "APPROUVÉE PAR SECRÉTAIRE"
            );
            
            setRequests(pendingRequests);
            setLoading(false);
        } catch (err) {
            setError('Failed to fetch requests data');
            setLoading(false);
            console.error('Error fetching requests:', err);
        }
    };

    const filterRequests = (): void => {
        let result = [...requests];
        
        // Apply search term
        if (searchTerm.trim() !== '') {
            const term = searchTerm.toLowerCase();
            result = result.filter(request => 
                request.filename.toLowerCase().includes(term) ||
                request.requestor_id.toLowerCase().includes(term) ||
                (request.director_comment && request.director_comment.toLowerCase().includes(term))
            );
        }
        
        setFilteredRequests(result);
    };

    const handleSearch = (e: ChangeEvent<HTMLInputElement>): void => {
        setSearchTerm(e.target.value);
    };

    // Function to determine status color
    const getStatusColor = (status: string): string => {
        return 'text-yellow-600 font-semibold';
    };

    // Format date to be more readable
    const formatDate = (dateString: string | null): string => {
        if (!dateString) return '-';
        const date = new Date(dateString);
        return date.toLocaleDateString('fr-CA', {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
    };

    const openPdf = (pdf_path: string) => {
        if (!pdf_path) {
          // Handle case where PDF URL is not available
          alert('PDF file is not available');
          return;
        }
        
        console.log(pdf_path);
        // Open PDF in new tab
        window.open(pdf_path, '_blank');
    };

    const toggleExpandRequest = (requestId: number): void => {
        if (expandedRequestId === requestId) {
            setExpandedRequestId(null);
            setDirectorComment('');
        } else {
            setExpandedRequestId(requestId);
            setDirectorComment('');
        }
        // Clear any action messages when toggling
        setActionMessage(null);
    };

    const handleUpdateRequestStatus = async (requestId: number, newStatus: string): Promise<void> => {
        if (!directorComment.trim()) {
            setActionMessage({
                text: 'Veuillez ajouter un commentaire avant de continuer',
                type: 'error'
            });
            return;
        }

        try {
            setActionLoading(true);
            
            // Send update request to backend
            await axios.put(route('requests.update', requestId), {
                status: newStatus,
                director_comment: directorComment
            });
            
            // Update the local state to reflect the change
            const updatedRequests = requests.filter(request => request.id !== requestId);
            setRequests(updatedRequests);
            setFilteredRequests(prev => prev.filter(request => request.id !== requestId));
            
            setActionLoading(false);
            setActionMessage({
                text: `Demande ${newStatus.toLowerCase()} avec succès`,
                type: 'success'
            });

            // Close the expanded section
            setTimeout(() => {
                setExpandedRequestId(null);
                setDirectorComment('');
                setActionMessage(null);
            }, 2000);
            
        } catch (err) {
            console.error('Error updating request status:', err);
            setActionLoading(false);
            setActionMessage({
                text: 'Erreur lors de la mise à jour du statut',
                type: 'error'
            });
        }
    };

    const handleCommentChange = (e: ChangeEvent<HTMLTextAreaElement>): void => {
        setDirectorComment(e.target.value);
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Demandes en attente
                </h2>
            }
        >
            <Head title="Demandes en attente" />
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
                                    {/* Search Control */}
                                    <div className="mb-6 flex flex-col space-y-4 md:flex-row md:items-end md:justify-between md:space-y-0">
                                        <div className="w-full md:w-1/2">
                                            <label htmlFor="search" className="mb-1 block text-sm font-medium">
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
                                        
                                        <div className="text-right">
                                            <span className="text-sm">
                                                {filteredRequests.length} {filteredRequests.length === 1 ? 'résultat' : 'résultats'}
                                            </span>
                                        </div>
                                    </div>
                                    
                                    {filteredRequests.length === 0 ? (
                                        <div className="py-8 text-center text-gray-500">
                                            Aucune demande en attente ne correspond à votre recherche
                                        </div>
                                    ) : (
                                        <div className="overflow-x-auto">
                                            <table className="min-w-full divide-y divide-gray-300 dark:divide-gray-600">
                                                <thead>
                                                    <tr className="bg-gray-100 dark:bg-gray-700">
                                                        <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">ID</th>
                                                        <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">Statut</th>
                                                        <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">Nom du fichier</th>
                                                        <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">Demandeur</th>
                                                        <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">Date de création</th>
                                                        <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">Dernière mise à jour</th>
                                                        <th className="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-700 dark:text-gray-300">Fichier PDF</th>
                                                    </tr>
                                                </thead>
                                                <tbody className="divide-y divide-gray-200 dark:divide-gray-700">
                                                    {filteredRequests.map((request) => (
                                                        <>
                                                            <tr 
                                                                key={request.id} 
                                                                className="cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700"
                                                                onClick={() => toggleExpandRequest(request.id)}
                                                            >
                                                                <td className="px-4 py-4 text-sm">{request.id}</td>
                                                                <td className="whitespace-nowrap px-4 py-4 text-sm">
                                                                    <span className={getStatusColor(request.status)}>
                                                                        {request.status.toUpperCase()}
                                                                    </span>
                                                                </td>
                                                                <td className="px-4 py-4 text-sm">{request.filename}</td>
                                                                <td className="whitespace-nowrap px-4 py-4 text-sm">
                                                                    {request.requestor_id}
                                                                </td>
                                                                <td className="whitespace-nowrap px-4 py-4 text-sm">{formatDate(request.created_at)}</td>
                                                                <td className="whitespace-nowrap px-4 py-4 text-sm">{formatDate(request.updated_at)}</td>
                                                                <td className="whitespace-nowrap px-4 py-4 text-sm">
                                                                    <button
                                                                        className="rounded-full bg-indigo-100 px-3 py-1 text-xs text-indigo-600 hover:bg-indigo-200"
                                                                        onClick={(e) => {
                                                                            e.stopPropagation(); // Prevent row click event
                                                                            openPdf(request.pdf_path);
                                                                        }}
                                                                    >
                                                                        Ouvrir PDF
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            {expandedRequestId === request.id && (
                                                                <tr>
                                                                    <td colSpan={7} className="bg-gray-50 px-4 py-6 dark:bg-gray-700">
                                                                        <div className="mb-4 rounded-lg border border-gray-200 p-4 shadow-sm dark:border-gray-600">
                                                                            <h3 className="mb-4 text-lg font-medium">Traiter la demande #{request.id}</h3>
                                                                            
                                                                            {actionMessage && (
                                                                                <div className={`mb-4 rounded-md p-3 ${actionMessage.type === 'success' ? 'bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100' : 'bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100'}`}>
                                                                                    {actionMessage.text}
                                                                                </div>
                                                                            )}
                                                                            
                                                                            <div className="mb-4">
                                                                                <label className="mb-2 block text-sm font-medium">
                                                                                    Commentaire
                                                                                </label>
                                                                                <textarea
                                                                                    value={directorComment}
                                                                                    onChange={handleCommentChange}
                                                                                    className="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white"
                                                                                    rows={3}
                                                                                    placeholder="Ajoutez un commentaire pour expliquer votre décision..."
                                                                                    required
                                                                                ></textarea>
                                                                            </div>
                                                                            
                                                                            <div className="flex flex-col gap-2 sm:flex-row">
                                                                                <button
                                                                                    onClick={() => handleUpdateRequestStatus(request.id, "APPROUVÉE PAR DIRECTEUR")}
                                                                                    className="flex items-center justify-center rounded-md bg-green-600 px-4 py-2 text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50"
                                                                                    disabled={actionLoading}
                                                                                >
                                                                                    {actionLoading ? 'Traitement en cours...' : 'Approuver la demande'}
                                                                                </button>
                                                                                
                                                                                <button
                                                                                    onClick={() => handleUpdateRequestStatus(request.id, "REFUSÉE PAR DIRECTEUR")}
                                                                                    className="flex items-center justify-center rounded-md bg-red-600 px-4 py-2 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-50"
                                                                                    disabled={actionLoading}
                                                                                >
                                                                                    {actionLoading ? 'Traitement en cours...' : 'Refuser la demande'}
                                                                                </button>
                                                                                
                                                                                <button
                                                                                    onClick={() => toggleExpandRequest(request.id)}
                                                                                    className="flex items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700"
                                                                                >
                                                                                    Annuler
                                                                                </button>
                                                                            </div>
                                                                        </div>
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
            <script dangerouslySetInnerHTML={{
                __html: `
                    function openPdf(pdfUrl) {
                        if (!pdfUrl) {
                            alert('PDF non disponible');
                            return;
                        }
                        window.open(pdfUrl, '_blank');
                    }
                `
            }} />

        </AuthenticatedLayout>
    );
}