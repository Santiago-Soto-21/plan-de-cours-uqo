import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';
import { PropsWithChildren } from 'react';

export default function Guest({ children }: PropsWithChildren) {
    return (
        <div className="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0 dark:bg-gray-900">
            <ApplicationLogo className="h-20 w-auto object-contain" />

            <h1 className="mt-6 text-3xl font-extrabold text-gray-900 dark:text-gray-100 sm:text-4xl">
                Bienvenue au site de gestion de plans de cours de l'UQO
            </h1>

            <div className="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg dark:bg-gray-800">
                <h1 className="mb-4 text-2xl font-extrabold text-gray-900 dark:text-gray-100 sm:text-2xl text-center">
                Veuillez vous connecter
                </h1>
                
                {children}
            </div>
        </div>
    );
}
