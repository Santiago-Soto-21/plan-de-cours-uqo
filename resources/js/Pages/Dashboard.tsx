import { useState } from "react";
import axios from "axios";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextInput from "@/Components/TextInput";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import { FormEventHandler } from "react";
import ReactQuill from "react-quill-new";

// Define a type alias for plan keys (section 4)
type PlanKey =
  | "plan1"
  | "plan2"
  | "plan3"
  | "plan4"
  | "plan5"
  | "plan6"
  | "plan7"
  | "plan8"
  | "plan9"
  | "plan10"
  | "plan11"
  | "plan12"
  | "plan13"
  | "plan14"
  | "plan15";

export default function Dashboard() {
  const { data, setData, post, processing, errors, reset } = useForm({
    // Section 1: Sigle du cours, groupe, session
    sigle: "",
    groupe: "",
    trimestre: "",
    trimestreCode: "",
    // Section 2: Stratégies pédagogiques
    objectifs: "",
    // Section 3: Stratégies pédagogiques
    strategies: "",
    // Section 4: Heures de disponibilité ou modalités pour rendez-vous
    disponibilite: "",
    // Section 5: Plan détaillé du cours sur 15 semaines (one per week)
    plan1: "",
    plan2: "",
    plan3: "",
    plan4: "",
    plan5: "",
    plan6: "",
    plan7: "",
    plan8: "",
    plan9: "",
    plan10: "",
    plan11: "",
    plan12: "",
    plan13: "",
    plan14: "",
    plan15: "",
    // Section 6: Évaluation du cours
    evaluation: "",
    // Section 7: Principales biographies
    biographies: "",

    //Data that will be obtained from API
    titreCours: "",
    nomProf: "",
    prenomProf: "",
    dateDebut: "",
    objectifContent: "",
    contenu: "",
  });

  const generateWeeklyDates = (startDate: string) => {
    // Parse the input date
    let date;

    // ISO format: "2025-01-13T00:00:00"
    date = new Date(startDate);

    const weeklyDates = [];

    // Generate 15 weekly dates
    for (let i = 0; i < 15; i++) {
      // Create a new date object to avoid modifying the original
      const currentDate = new Date(date);
      currentDate.setDate(date.getDate() + i * 7);

      // Format the date in French
      weeklyDates.push(formatDateInFrench(currentDate));
    }

    return weeklyDates;
  };

  /**
   * Formats a Date object into French format "13 janvier 2025"
   * @param {Date} date - The date to format
   * @returns {string} Formatted date string
   */
  const formatDateInFrench = (date: Date) => {
    const day = date.getDate();
    const year = date.getFullYear();

    const monthMap = [
      "janvier",
      "février",
      "mars",
      "avril",
      "mai",
      "juin",
      "juillet",
      "août",
      "septembre",
      "octobre",
      "novembre",
      "décembre",
    ];

    const month = monthMap[date.getMonth()];

    return `${day} ${month} ${year}`;
  };

  const fetchCourseData = async (sigle: string, trimestreCode: string) => {
    try {
      const response = await axios.post(
        route("fetch.course.data"),
        { sigle, trimestreCode },
        {
          headers: {
            "X-CSRF-TOKEN":
              document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content") || "",
          },
        }
      );

      const html = response.data.description.html;

      // Find Objectifs section using regex
      const objectifsMatch = html.match(
        /<h4><strong>Objectifs<\/strong><\/h4>\s*<div[^>]*>([\s\S]*?)<\/div>/i
      );
      const objectifsContent = objectifsMatch
        ? objectifsMatch[1].replace(/<[^>]*>/g, "").trim()
        : "Objectifs not found";

      // Find Contenu section using regex
      const contenuMatch = html.match(
        /<h4><strong>Contenu<\/strong><\/h4>\s*<div[^>]*>([\s\S]*?)<\/div>/i
      );
      const contenuContent = contenuMatch
        ? contenuMatch[1].replace(/<[^>]*>/g, "").trim()
        : "Contenu not found";

      const semaines = generateWeeklyDates(response.data.schedule[0].LstActCrs[0].CollActCrsHor[0].DateDHor);

      const newData = {
        ...data,

        // Update form fields with the extracted data
        // Adjust according to your form field structure
        semaines: semaines,
        titreCours: response.data.schedule[0].TitreCrs,
        nomProf: response.data.schedule[0].LstActCrs[0].LstEnsei[0].Nom,
        prenomProf: response.data.schedule[0].LstActCrs[0].LstEnsei[0].Prenom,
        objectifContent: objectifsContent,
        contenu: contenuContent
      };

      return newData;
    } catch (error) {
      console.error("Failed to fetch course data", error);
    }
  };

  const submit: FormEventHandler = async (e) => {
    e.preventDefault();

    const updatedData = await fetchCourseData(data.sigle, data.trimestreCode);

    axios
      .post(route("generate.pdf"), updatedData, {
        responseType: "blob",
        headers: {
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN":
            document
              .querySelector('meta[name="csrf-token"]')
              ?.getAttribute("content") || "",
        },
      })
      .then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement("a");
        link.href = url;
        link.setAttribute("download", "plan-de-cours.pdf");
        document.body.appendChild(link);
        link.click();
        link.remove();
      })
      .catch((error) => {
        console.error("PDF download failed", error);
      });
  };

  // Define a common toolbar configuration for basic formatting options
  const toolbarOptions = {
    toolbar: [
      [{ header: [1, 2, 3, 4, 5, 6, false] }], // custom dropdown
      ["bold", "italic", "underline", "strike"], // toggled buttons
      ["blockquote", "code-block"],
      ["link", "image", "formula"],

      [{ list: "ordered" }, { list: "bullet" }, { list: "check" }],
      [{ script: "sub" }, { script: "super" }], // superscript/subscript
      [{ indent: "-1" }, { indent: "+1" }], // outdent/indent
      [{ direction: "rtl" }], // text direction

      [{ color: [] }, { background: [] }], // dropdown with defaults from theme
      [{ align: [] }],

      ["clean"], // remove formatting button
    ],
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
                {/* Section 1: Sigle du cours, groupe et session */}
                <div>
                  <InputLabel
                    htmlFor="sigle"
                    value="Sigle du cours"
                    className="text-xl font-bold"
                  />
                  <TextInput
                    id="sigle"
                    type="text"
                    name="sigle"
                    value={data.sigle}
                    className="mt-1 block w-18"
                    maxLength={7}
                    placeholder="XXX####"
                    onChange={(e) => {
                      setData("sigle", e.target.value.toUpperCase());
                    }}
                  />
                  <InputError message={errors.sigle} className="mt-2" />
                </div>

                <div className="mt-2">
                  <InputLabel
                    htmlFor="groupe"
                    value="Groupe"
                    className="text-xl font-bold"
                  />
                  <TextInput
                    id="groupe"
                    type="text"
                    name="groupe"
                    value={data.groupe}
                    className="mt-1 block w-12"
                    maxLength={2}
                    placeholder="##"
                    onChange={(e) => {
                      // Only allow digits
                      const value = e.target.value.replace(/[^0-9]/g, "");
                      setData("groupe", value);
                    }}
                    pattern="[0-9]*"
                  />
                  <InputError message={errors.groupe} className="mt-2" />
                </div>

                <div className="mt-2">
                  <InputLabel
                    htmlFor="trimestre"
                    value="Trimestre"
                    className="text-xl font-bold"
                  />
                  <p className="mt-1 text-sm text-gray-500">
                    Format : Trimestre suivit de l'année
                    <br></br>
                    Exemple : "Hiver 2025"
                  </p>
                  <TextInput
                    id="trimestre"
                    type="text"
                    name="trimestre"
                    value={data.trimestre}
                    className="mt-1 block w-18"
                    maxLength={12}
                    placeholder="Trimestre Année"
                    onChange={(e) => {
                      // Capitalize first letter
                      let value = e.target.value;
                      if (value.length > 0) {
                        value = value.charAt(0).toUpperCase() + value.slice(1);
                      }
                      setData("trimestre", value);

                      // Convert session text to code (e.g., "Hiver 2025" to "20251")
                      const sessionText = e.target.value.trim();

                      // Extract year and session name using regex
                      const match = sessionText.match(/(\b\w+\b).*?(\d{4})/i);

                      if (match) {
                        const sessionName = match[1].toLowerCase();
                        const year = match[2];

                        // Convert session name to number
                        let sessionNumber = "1"; // Default to 1 (Hiver)

                        if (sessionName === "hiver") {
                          sessionNumber = "1";
                        } else if (
                          sessionName === "été" ||
                          sessionName === "ete"
                        ) {
                          sessionNumber = "2";
                        } else if (
                          sessionName === "automne" ||
                          sessionName === "fall"
                        ) {
                          sessionNumber = "3";
                        }

                        // Create the formatted session code
                        const sessionCode = `${year}${sessionNumber}`;
                        setData("trimestreCode", sessionCode);
                      }
                    }}
                  />
                  <InputError message={errors.trimestre} className="mt-2" />
                  <InputError message={errors.trimestreCode} className="mt-2" />
                </div>

                {/* Section 2: Objectifs spécifiques du cours */}
                <div className="mt-4">
                  <InputLabel
                    htmlFor="objectifs"
                    value="Objectifs spécifiques du cours"
                    className="text-xl font-bold"
                  />
                  <ReactQuill
                    theme="snow"
                    value={data.objectifs}
                    onChange={(value) => setData("objectifs", value)}
                    modules={toolbarOptions}
                    style={{ height: "300px", marginBottom: "80px" }}
                  />
                  <InputError message={errors.strategies} className="mt-2" />
                </div>

                {/* Section 3: Stratégies pédagogiques */}
                <div className="mt-4">
                  <InputLabel
                    htmlFor="strategies"
                    value="Stratégies pédagogiques"
                    className="text-xl font-bold"
                  />
                  <ReactQuill
                    theme="snow"
                    value={data.strategies}
                    onChange={(value) => setData("strategies", value)}
                    modules={toolbarOptions}
                    style={{ height: "300px", marginBottom: "80px" }}
                  />
                  <InputError message={errors.strategies} className="mt-2" />
                </div>

                {/* Section 3: Heures de disponibilité ou modalités pour rendez-vous */}
                <div className="mt-4">
                  <InputLabel
                    htmlFor="disponibilite"
                    value="Heures de disponibilité ou modalités pour rendez-vous"
                    className="text-xl font-bold"
                  />
                  <ReactQuill
                    theme="snow"
                    value={data.disponibilite}
                    onChange={(value) => setData("disponibilite", value)}
                    modules={toolbarOptions}
                    style={{ height: "100px", marginBottom: "80px" }}
                  />
                  <InputError message={errors.disponibilite} className="mt-2" />
                </div>

                {/* Section 4: Plan détaillé du cours sur 15 semaines */}
                <div className="mt-4">
                  <InputLabel
                    value="Plan détaillé du cours sur 15 semaines"
                    className="text-xl font-bold"
                  />
                  {[...Array(15)].map((_, index) => {
                    const week = index + 1;
                    // Assert that the key is one of the allowed plan keys
                    const key = `plan${week}` as PlanKey;
                    return (
                      <div key={week} className="mt-2">
                        <InputLabel htmlFor={key} value={`Semaine ${week}`} />
                        <ReactQuill
                          theme="snow"
                          value={data[key]}
                          onChange={(value) => setData(key, value)}
                          modules={toolbarOptions}
                          style={{ height: "300px", marginBottom: "60px" }}
                        />
                        <InputError message={errors[key]} className="mt-2" />
                      </div>
                    );
                  })}
                </div>

                {/* Section 5: Évaluation du cours */}
                <div className="mt-20">
                  <InputLabel
                    htmlFor="evaluation"
                    value="Évaluation du cours"
                    className="text-xl font-bold"
                  />
                  <ReactQuill
                    theme="snow"
                    value={data.evaluation}
                    onChange={(value) => setData("evaluation", value)}
                    modules={toolbarOptions}
                    style={{ height: "300px", marginBottom: "80px" }}
                  />
                  <InputError message={errors.evaluation} className="mt-2" />
                </div>

                {/* Section 6: Principales biographies */}
                <div className="mt-4">
                  <InputLabel
                    htmlFor="biographies"
                    value="Principales biographies"
                    className="text-xl font-bold"
                  />
                  <ReactQuill
                    theme="snow"
                    value={data.biographies}
                    onChange={(value) => setData("biographies", value)}
                    modules={toolbarOptions}
                    style={{ height: "300px", marginBottom: "50px" }}
                  />
                  <InputError message={errors.biographies} className="mt-2" />
                </div>

                <div className="mt-4 flex items-center justify-end">
                  <PrimaryButton className="ms-4" disabled={processing}>
                    GÉNÉRER PLAN DE COURS
                  </PrimaryButton>

                  <SecondaryButton
                    type="submit"
                    className="ml-2 flex items-center justify-end"
                  >
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
