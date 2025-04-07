import axios from 'axios';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import SecondaryButton from '@/Components/SecondaryButton';
import TextInput from '@/Components/TextInput';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm } from '@inertiajs/react';
import { FormEventHandler } from 'react';
import ReactQuill from 'react-quill-new';

// Define a type alias for plan keys (section 4)
type PlanKey =
    | 'plan1'
    | 'plan2'
    | 'plan3'
    | 'plan4'
    | 'plan5'
    | 'plan6'
    | 'plan7'
    | 'plan8'
    | 'plan9'
    | 'plan10'
    | 'plan11'
    | 'plan12'
    | 'plan13'
    | 'plan14'
    | 'plan15';

export default function Dashboard() {
    const { data, setData, post, processing, errors, reset } = useForm({
        // Section 1: Sigle du cours (small input, 7 characters)
        sigle: '',
        // Section 2: Stratégies pédagogiques
        strategies: '',
        // Section 3: Heures de disponibilité ou modalités pour rendez-vous
        disponibilite: '',
        // Section 4: Plan détaillé du cours sur 15 semaines (one per week)
        plan1: '', plan2: '', plan3: '', plan4: '', plan5: '',
        plan6: '', plan7: '', plan8: '', plan9: '', plan10: '',
        plan11: '', plan12: '', plan13: '', plan14: '', plan15: '',
        // Section 5: Évaluation du cours
        evaluation: '',
        // Section 6: Principales biographies
        biographies: '',
    });

    const submit: FormEventHandler = (e) => {
        e.preventDefault();
    
        axios.post(route('generate.pdf'), data, {
            responseType: 'blob',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '',
            },
        })
        .then((response) => {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download', 'plan-de-cours.pdf');
            document.body.appendChild(link);
            link.click();
            link.remove();
        })
        .catch((error) => {
            console.error('PDF download failed', error);
        });
    };

    // Define a common toolbar configuration for basic formatting options
    const toolbarOptions = {
        toolbar: [
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],         // custom dropdown
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block'],
            ['link', 'image', 'formula'],
         
            [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'list': 'check' }],
            [{ 'script': 'sub' }, { 'script': 'super' }],      // superscript/subscript
            [{ 'indent': '-1' }, { 'indent': '+1' }],          // outdent/indent
            [{ 'direction': 'rtl' }],                         // text direction

            [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
            [{ 'align': [] }],

            ['clean']                                         // remove formatting button
        ]
    };

    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Nouvelle demande
                </h2>
            }
        >
            <Head title="Nouvelle demande" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                        <div className="p-6 text-gray-900 dark:text-gray-100">
                            <form onSubmit={submit}>
                                {/* Section 1: Sigle du cours */}
                                <div>
                                    <InputLabel htmlFor="sigle" value="Sigle du cours" className="text-xl font-bold"/>
                                    <TextInput
                                        id="sigle"
                                        type="text"
                                        name="sigle"
                                        value={data.sigle}
                                        className="mt-1 block w-1/3"
                                        maxLength={7}
                                        onChange={(e) => setData('sigle', e.target.value)}
                                    />
                                    <InputError message={errors.sigle} className="mt-2" />
                                </div>

                                {/* Section 2: Stratégies pédagogiques */}
                                <div className="mt-4">
                                    <InputLabel htmlFor="strategies" value="Stratégies pédagogiques" className="text-xl font-bold"/>
                                    <ReactQuill
                                        theme="snow"
                                        value={data.strategies}
                                        onChange={(value) => setData('strategies', value)}
                                        modules={toolbarOptions}
                                        style={{ height: '300px', marginBottom: '80px' }}
                                    />
                                    <InputError message={errors.strategies} className="mt-2" />
                                </div>

                                {/* Section 3: Heures de disponibilité ou modalités pour rendez-vous */}
                                <div className="mt-4">
                                    <InputLabel htmlFor="disponibilite" value="Heures de disponibilité ou modalités pour rendez-vous" className="text-xl font-bold"/>
                                    <ReactQuill
                                        theme="snow"
                                        value={data.disponibilite}
                                        onChange={(value) => setData('disponibilite', value)}
                                        modules={toolbarOptions}
                                        style={{ height: '100px', marginBottom: '80px' }}
                                    />
                                    <InputError message={errors.disponibilite} className="mt-2" />
                                </div>

                                {/* Section 4: Plan détaillé du cours sur 15 semaines */}
                                <div className="mt-4">
                                    <InputLabel value="Plan détaillé du cours sur 15 semaines" className="text-xl font-bold"/>
                                    {[...Array(15)].map((_, index) => {
                                        const week = index + 1;
                                        // Assert that the key is one of the allowed plan keys
                                        const key = (`plan${week}`) as PlanKey;
                                        return (
                                            <div key={week} className="mt-2">
                                                <InputLabel htmlFor={key} value={`Semaine ${week}`}/>
                                                <ReactQuill
                                                    theme="snow"
                                                    value={data[key]}
                                                    onChange={(value) => setData(key, value)}
                                                    modules={toolbarOptions}
                                                    style={{ height: '300px', marginBottom: '60px' }}
                                                />
                                                <InputError message={errors[key]} className="mt-2" />
                                            </div>
                                        );
                                    })}
                                </div>

                                {/* Section 5: Évaluation du cours */}
                                <div className="mt-20">
                                    <InputLabel htmlFor="evaluation" value="Évaluation du cours" className="text-xl font-bold"/>
                                    <ReactQuill
                                        theme="snow"
                                        value={data.evaluation}
                                        onChange={(value) => setData('evaluation', value)}
                                        modules={toolbarOptions}
                                        style={{ height: '300px', marginBottom: '80px' }}
                                    />
                                    <InputError message={errors.evaluation} className="mt-2" />
                                </div>

                                {/* Section 6: Principales biographies */}
                                <div className="mt-4">
                                    <InputLabel htmlFor="biographies" value="Principales biographies" className="text-xl font-bold"/>
                                    <ReactQuill
                                        theme="snow"
                                        value={data.biographies}
                                        onChange={(value) => setData('biographies', value)}
                                        modules={toolbarOptions}
                                        style={{ height: '300px', marginBottom: '50px' }}
                                    />
                                    <InputError message={errors.biographies} className="mt-2" />
                                </div>

                                <div className="mt-4 flex items-center justify-end">
                                    <PrimaryButton type="submit" className="ms-4" disabled={processing}>
                                        GÉNÉRER PLAN DE COURS
                                    </PrimaryButton>

                                    <SecondaryButton className="ml-2 flex items-center justify-end">
                                        APERÇU
                                    </SecondaryButton>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
