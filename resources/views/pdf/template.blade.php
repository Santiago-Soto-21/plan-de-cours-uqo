<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>UQO - DII - Plan du cours INF1563</title>
    <meta name="author" content="Baaziz, Nadia" />
    <style>
        @font-face {
          font-family: 'verdana';
          font-style: normal;
          font-weight: 400;
          src: url('{{ resource_path('fonts/verdana/verdana.ttf') }}') format('truetype');
        }

        body {
            font-family: 'verdana', sans-serif;
        }
    </style>
    <style type="text/css">
      * {
        margin: 0;
        padding: 0;
        text-indent: 0;
      }
      .s1 {
        color: #c90;
        font-family: Verdana, sans-serif;
        font-style: normal;
        font-weight: bold;
        text-decoration: none;
        font-size: 10pt;
      }
      .s4 {
        color: black;
        font-family: Verdana, sans-serif;
        font-style: normal;
        font-weight: bold;
        text-decoration: none;
        font-size: 9pt;
      }
      .s5 {
        color: black;
        font-family: Verdana, sans-serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 9pt;
      }
      .s6 {
        color: black;
        font-family: Verdana, sans-serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: underline;
        font-size: 9pt;
      }
      .s7 {
        color: black;
        font-family: Verdana, sans-serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 9pt;
      }
      .s8 {
        color: black;
        font-family: "Calibri Light", sans-serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      .s9 {
        color: #0562c1;
        font-family: "Times New Roman", serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: underline;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l1 {
        padding-left: 0pt;
        counter-reset: c1 1;
      }
      #l1 > li > *:first-child:before {
        counter-increment: c1;
        content: counter(c1, decimal) ". ";
        color: black;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
      }
      #l1 > li:first-child > *:first-child:before {
        counter-increment: c1 0;
      }
      li {
        display: block;
      }
      #l2 {
        padding-left: 0pt;
      }
      #l2 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l3 {
        padding-left: 0pt;
      }
      #l3 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l4 {
        padding-left: 0pt;
      }
      #l4 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      #l5 {
        padding-left: 0pt;
      }
      #l5 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l6 {
        padding-left: 0pt;
      }
      #l6 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l7 {
        padding-left: 0pt;
      }
      #l7 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l8 {
        padding-left: 0pt;
      }
      #l8 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l9 {
        padding-left: 0pt;
      }
      #l9 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l10 {
        padding-left: 0pt;
      }
      #l10 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      #l11 {
        padding-left: 0pt;
      }
      #l11 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l12 {
        padding-left: 0pt;
      }
      #l12 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l13 {
        padding-left: 0pt;
      }
      #l13 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      #l14 {
        padding-left: 0pt;
      }
      #l14 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l15 {
        padding-left: 0pt;
      }
      #l15 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      #l16 {
        padding-left: 0pt;
      }
      #l16 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      #l17 {
        padding-left: 0pt;
      }
      #l17 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l18 {
        padding-left: 0pt;
      }
      #l18 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      #l19 {
        padding-left: 0pt;
      }
      #l19 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      #l20 {
        padding-left: 0pt;
      }
      #l20 > li > *:first-child:before {
        content: "o ";
        color: black;
        font-family: "Courier New", monospace;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l21 {
        padding-left: 0pt;
      }
      #l21 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l22 {
        padding-left: 0pt;
      }
      #l22 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l23 {
        padding-left: 0pt;
      }
      #l23 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 10pt;
      }
      li {
        display: block;
      }
      #l24 {
        padding-left: 0pt;
      }
      #l24 > li > *:first-child:before {
        content: " ";
        color: black;
        font-family: Symbol, serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 11pt;
      }
      li {
        display: block;
      }
      #l25 {
        padding-left: 0pt;
        counter-reset: t1 1;
      }
      #l25 > li > *:first-child:before {
        counter-increment: t1;
        content: counter(t1, decimal) ". ";
        color: black;
        font-family: Verdana, sans-serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 9pt;
      }
      #l25 > li:first-child > *:first-child:before {
        counter-increment: t1 0;
      }
      li {
        display: block;
      }
      #l26 {
        padding-left: 0pt;
        counter-reset: u1 1;
      }
      #l26 > li > *:first-child:before {
        counter-increment: u1;
        content: counter(u1, decimal) ". ";
        color: black;
        font-family: Verdana, sans-serif;
        font-style: normal;
        font-weight: normal;
        text-decoration: none;
        font-size: 9pt;
      }
      #l26 > li:first-child > *:first-child:before {
        counter-increment: u1 0;
      }
      table,
      tbody {
        vertical-align: top;
        overflow: visible;
      }
    </style>
  </head>
  <body>
    <table
      style="border-collapse: collapse; margin-left: 6.255pt"
      cellspacing="0"
    >
      <tr style="height: 23pt">
        <td
          style="
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
          bgcolor="#000066"
        >
          <p
            class="s1"
            style="
              padding-top: 5pt;
              padding-left: 2pt;
              text-indent: 0pt;
              text-align: left;
            "
          >
            Université du Québec en Outaouais Département d&#39;informatique et
            d&#39;ingénierie
          </p>
        </td>
      </tr>
      <tr style="height: 54pt">
        <td
          style="
            padding-bottom: 2pt;
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
        >
          <p
            class="s1"
            style="
              padding-top: 2pt;
              padding-left: 6pt;
              text-indent: 0pt;
              line-height: 12pt;
              text-align: left;
            "
          >
            Sigle : <span style="color: #000">{!! $data['sigle'] !!} </span> Gr.
            <span style="color: #000">01</span>
          </p>
          <p
            class="s1"
            style="
              padding-left: 6pt;
              padding-right: 295pt;
              text-indent: 0pt;
              text-align: left;
            "
          >
            Titre :
            <span style="color: #000"
              >Théorie des langages et calculabilité </span
            >
            <br />
            Session :
            <a
              href="http://etudier.uqo.ca/horaire"
              style="
                color: black;
                font-family: Verdana, sans-serif;
                font-style: normal;
                font-weight: bold;
                text-decoration: none;
                font-size: 10pt;
              "
              target="_blank"
              >Hiver 2025 </a
            ><span
              style="
                color: black;
                font-family: Verdana, sans-serif;
                font-style: normal;
                font-weight: bold;
                text-decoration: underline;
                font-size: 10pt;
              "
              >Horaire et local</span
            >
            <br />
            Professeur : <span style="color: #000">Yapi, N’Dah Daniel</span>
          </p>
        </td>
      </tr>
      <tr style="height: 18pt">
        <td
          style="
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
          bgcolor="#000066"
        >
          <p
            class="s1"
            style="padding-top: 2pt; text-indent: 0pt; text-align: left"
          >
            1. Description du cours paraissant à l&#39;annuaire :
          </p>
        </td>
      </tr>
      <tr style="height: 144pt">
        <td
          style="
            padding-bottom: 7pt;
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
        >
          <p
            class="s4"
            style="
              padding-top: 7pt;
              padding-left: 6pt;
              text-indent: 0pt;
              text-align: left;
            "
          >
            <a name="bookmark0">Objectifs</a>
          </p>
          <p
            class="s5"
            style="
              padding-top: 5pt;
              padding-left: 6pt;
              text-indent: 0pt;
              text-align: left;
            "
          >
            <a name="bookmark1">Au terme de ce cours, l&#39;étudiant.e
            sera initié aux différents modèles de calcul; sera familier avec la
            théorie des langages formels; aura une compréhension des limitations
            des ordinateurs.</a>
          </p>
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s4"
            style="padding-left: 6pt; text-indent: 0pt; text-align: left"
          >
            <a name="bookmark2">Contenu</a>
          </p>
          <p
            class="s5"
            style="
              padding-top: 3pt;
              padding-left: 6pt;
              padding-right: 6pt;
              text-indent: 0pt;
              text-align: justify;
            "
          >
            Langages réguliers et automates finis. Langages hors contexte et
            automates à pile. Grammaires contextuelles. Hiérarchie de Chomsky.
            Machines de Turing. Hypothèse de Church. Calculabilité et
            déterminisme. Classes de complexité. Problèmes indécidables.
            Introduction à la calculabilité quantique. Ce cours comporte des
            séances obligatoires de travaux dirigés (TD).
          </p>
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p style="padding-left: 6pt; text-indent: 0pt; text-align: left">
            <a
              href="https://etudier.uqo.ca/cours/description-cours/INF1723"
              class="s6"
              >Descriptif – Annuaire</a
            >
          </p>
        </td>
      </tr>
      <tr style="height: 18pt">
        <td
          style="
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
          bgcolor="#000066"
        >
          <p
            class="s1"
            style="padding-top: 2pt; text-indent: 0pt; text-align: left"
          >
            2. Objectifs spécifiques du cours :
          </p>
        </td>
      </tr>
      <tr style="height: 94pt">
        <td
          style="
            padding-right: 6pt;
            width: 569pt;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
        >
          <ol id="l1">
            <li data-list-text="1.">
              <p
                class="s5"
                style="
                  padding-top: 2pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  text-align: justify;
                "
              >
                Initier l&#39;étudiant(e) aux fondements théoriques de
                l&#39;informatique;
              </p>
            </li>
            <li data-list-text="2.">
              <p
                class="s5"
                style="
                  padding-left: 36pt;
                  padding-right: 1pt;
                  text-indent: -18pt;
                  text-align: justify;
                "
              >
                Familiariser l&#39;étudiant(e) avec la théorie des langages et
                calculabilité et à son application à la construction des
                logiciels, des langages de programmation et ses compilateurs;
              </p>
            </li>
            <li data-list-text="3.">
              <p
                class="s5"
                style="
                  padding-left: 36pt;
                  padding-right: 1pt;
                  text-indent: -18pt;
                  text-align: justify;
                "
              >
                Familiariser l&#39;étudiant(e) avec les limites posées par les
                ordinateurs contemporains et quantiques : introduire la classe
                de problèmes indécidables (impossibles à résoudre) et la classe
                de fonctions incalculables. Problème de déterminisme en
                informatique. L&#39;étudiant(e) se rendra compte de ce qu’il est
                possible et de ce qui n&#39;est pas possible de réaliser à
                l&#39;aide des ordinateurs contemporains et quantiques.
              </p>
            </li>
          </ol>
        </td>
      </tr>
      <tr style="height: 17pt">
        <td
          style="
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
          bgcolor="#000066"
        >
          <p
            class="s1"
            style="padding-top: 2pt; text-indent: 0pt; text-align: left"
          >
            3. Stratégies pédagogiques :
          </p>
        </td>
      </tr>
      <tr style="height: 67pt">
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['strategies'] !!}
              </p>
        </td>
      </tr>
      <tr style="height: 18pt">
        <td
          style="
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
          bgcolor="#000066"
        >
          <p
            class="s1"
            style="padding-top: 2pt; text-indent: 0pt; text-align: left"
          >
            4. Heures de disponibilité ou modalités pour rendez-vous :
          </p>
        </td>
      </tr>
      <tr style="height: 39pt">
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['disponibilite'] !!}
              </p>
        </td>
      </tr>
      <tr style="height: 18pt">
        <td
          style="
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
          bgcolor="#000066"
        >
          <p
            class="s1"
            style="padding-top: 2pt; text-indent: 0pt; text-align: left"
          >
            5. Plan détaillé du cours sur 15 semaines :
          </p>
        </td>
      </tr>
      <tr style="height: 16pt">
        <td
          style="
            padding-bottom: 2pt;
            width: 49pt;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          bgcolor="#CCCCCC"
        >
          <p
            class="s4"
            style="
              padding-top: 2pt;
              padding-right: 1pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            Semaine
          </p>
        </td>
        <td
          style="
            padding-bottom: 2pt;
            width: 418pt;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          bgcolor="#CCCCCC"
        >
          <p
            class="s4"
            style="padding-top: 2pt; text-indent: 0pt; text-align: center"
          >
            Thèmes
          </p>
        </td>
        <td
          style="
            padding-bottom: 2pt;
            width: 102pt;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          bgcolor="#CCCCCC"
        >
          <p
            class="s4"
            style="
              padding-top: 2pt;
              padding-left: 2pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            Dates
          </p>
        </td>
      </tr>
      <tr style="height: 75pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            1
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan1'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            13 janv. 2025
          </p>
        </td>
      </tr>
      <tr style="height: 155pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            2
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan2'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 3pt; text-indent: 0pt; text-align: center"
          >
            20 janv. 2025
          </p>
        </td>
      </tr>
      <tr style="height: 88pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            3
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan3'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            27 janv. 2025
          </p>
        </td>
      </tr>
      style="border-collapse: collapse; margin-left: 6.255pt"
      cellspacing="0"
    >
      <tr style="height: 102pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            4
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan4'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            3 fév. 2025
          </p>
        </td>
      </tr>
      <tr style="height: 120pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            5
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="padding-top: 4pt; text-indent: 0pt; text-align: left">
            <br />
          </p>
          <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan5'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            10 fev. 2025
          </p>
        </td>
      </tr>
      <tr style="height: 120pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            6
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan6'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            17 fev. 2025
          </p>
        </td>
      </tr>
      <tr style="height: 20pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p
            class="s5"
            style="
              padding-top: 4pt;
              padding-right: 1pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            7
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan7'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p
            class="s5"
            style="
              padding-top: 4pt;
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            24 fev. 2025
          </p>
        </td>
      </tr>
      <tr style="height: 16pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p
            class="s5"
            style="
              padding-top: 2pt;
              padding-right: 1pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            8
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan8'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p
            class="s5"
            style="
              padding-top: 2pt;
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            3 au 7 mars 2025
          </p>
        </td>
      </tr>
      <tr style="height: 134pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            9
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan9'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            10 mars 2025
          </p>
        </td>
      </tr>
      <tr style="height: 127pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            10
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan10'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            17 mars 2025
          </p>
        </td>
      </tr>
      <tr style="height: 118pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            11
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan11'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            24 mars 2025
          </p>
        </td>
      </tr>
      <tr style="height: 103pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            12
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan12'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            31 mars 2025
          </p>
        </td>
      </tr>
      <tr style="height: 109pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="padding-right: 1pt; text-indent: 0pt; text-align: center"
          >
            13
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="padding-top: 1pt; text-indent: 0pt; text-align: left">
            <br />
          </p>
          <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan13'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p style="text-indent: 0pt; text-align: left"><br /></p>
          <p
            class="s5"
            style="
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            07 avril 2025
          </p>
        </td>
      </tr>
      <tr style="height: 16pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p
            class="s5"
            style="
              padding-top: 2pt;
              padding-right: 1pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            14
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan14'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p
            class="s5"
            style="
              padding-top: 2pt;
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            14 avril 2025
          </p>
        </td>
      </tr>
      <tr style="height: 22pt">
        <td
          style="
            width: 49pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p
            class="s5"
            style="
              padding-top: 5pt;
              padding-right: 1pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            15
          </p>
        </td>
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 418pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['plan15'] !!}
              </p>
        </td>
        <td
          style="
            width: 102pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
        >
          <p
            class="s5"
            style="
              padding-top: 2pt;
              padding-left: 3pt;
              padding-right: 3pt;
              text-indent: 0pt;
              text-align: center;
            "
          >
            21 avril 2025
          </p>
        </td>
      </tr>
      <tr style="height: 18pt">
        <td
          style="
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
          bgcolor="#000066"
        >
          <p
            class="s1"
            style="padding-top: 2pt; text-indent: 0pt; text-align: left"
          >
            6. Évaluation du cours :
          </p>
        </td>
      </tr>
      <tr style="height: 66pt">
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['evaluation'] !!}
              </p>
        </td>
      </tr>
      <tr style="height: 18pt">
        <td
          style="
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
          bgcolor="#000066"
        >
          <p
            class="s1"
            style="padding-top: 2pt; text-indent: 0pt; text-align: left"
          >
            7. Politiques départementales et institutionnelles :
          </p>
        </td>
      </tr>
      <tr style="height: 252pt">
        <td
          style="
            padding-bottom: 7pt;
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
        >
          <ul id="l24">
            <li data-list-text="">
              <p
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 13pt;
                  text-align: left;
                "
              >
                <a href="https://uqo.ca/docs/46808" class="s6"
                  >Politiques relatives à la tenue des examens</a
                >
              </p>
            </li>
            <li data-list-text="">
              <p
                style="
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 13pt;
                  text-align: left;
                "
              >
                <a href="https://uqo.ca/docs/46809" class="s6"
                  >Note sur le plagiat et les fraudes</a
                >
              </p>
            </li>
            <li data-list-text="">
              <p
                style="
                  padding-left: 36pt;
                  padding-right: 1pt;
                  text-indent: -18pt;
                  text-align: left;
                "
              >
                <span
                  style="
                    color: black;
                    font-family: Verdana, sans-serif;
                    font-style: normal;
                    font-weight: normal;
                    text-decoration: underline;
                    font-size: 9pt;
                  "
                  >Politique relative à la qualité de l&#39;expression française
                  écrite chez les étudiants et les étudiantes de premier cycle
                  à</span
                ><a
                  href="http://uqo.ca/futurs-etudiants/politique-linguistique"
                  class="s7"
                  target="_blank"
                >
                </a
                ><a
                  href="http://uqo.ca/futurs-etudiants/politique-linguistique"
                  class="s6"
                  target="_blank"
                  >l&#39;UQO</a
                >
              </p>
            </li>
            <li data-list-text="">
              <p
                style="padding-left: 36pt; text-indent: -17pt; text-align: left"
              >
                <a href="http://uqo.ca/docs/10858" class="s7" target="_blank"
                  >Absence aux examens : </a
                ><span
                  style="
                    color: black;
                    font-family: Verdana, sans-serif;
                    font-style: normal;
                    font-weight: normal;
                    text-decoration: underline;
                    font-size: 9pt;
                  "
                  >cadre de gestion</span
                ><a href="http://uqo.ca/docs/10857" class="s7" target="_blank"
                  >, </a
                ><a href="http://uqo.ca/docs/10857" class="s6" target="_blank"
                  >demande de reprise d&#39;examen (formulaire)</a
                >
              </p>
            </li>
          </ul>
          <p style="padding-top: 5pt; text-indent: 0pt; text-align: left">
            <br />
          </p>
          <p
            class="s8"
            style="padding-left: 165pt; text-indent: 0pt; text-align: justify"
          >
            Tolérance ZÉRO en matière de violence à caractère sexuel.
          </p>
          <p
            class="s8"
            style="
              padding-top: 6pt;
              padding-left: 74pt;
              padding-right: 77pt;
              text-indent: 0pt;
              text-align: justify;
            "
          >
            Le Bureau d’intervention et de prévention en matière de harcèlement
            (BIPH) a pour mission d’accueillir, soutenir et guider toute
            personne vivant une situation de harcèlement, de discrimination ou
            de violence à caractère sexuel. Le BIPH oriente ses actions afin de
            prévenir les violences à caractère sexuel pour que nous puissions
            étudier, travailler et s’épanouir dans un milieu sain et
            sécuritaire.
          </p>
          <p
            class="s8"
            style="
              padding-left: 74pt;
              padding-right: 76pt;
              text-indent: 0pt;
              text-align: justify;
            "
          >
            Vous vivez ou êtes une personne témoin d’une situation de violence à
            caractère sexuel ? Vous êtes une personne membre de la communauté
            étudiante ou une personne membre du personnel, autant à Gatineau
            qu’à Ripon et St-Jérôme, l’équipe du BIPH est là pour vous, sans
            jugement et en toute confidentialité.
          </p>
          <p
            class="s8"
            style="padding-left: 74pt; text-indent: 0pt; text-align: justify"
          >
            Ensemble, participons à une culture de respect.
          </p>
          <p style="padding-left: 74pt; text-indent: 0pt; text-align: justify">
            <a
              href="mailto:Biph@uqo.ca"
              style="
                color: black;
                font-family: 'Calibri Light', sans-serif;
                font-style: normal;
                font-weight: normal;
                text-decoration: none;
                font-size: 10pt;
              "
              target="_blank"
              >Pour de plus amples renseignements consultez UQO.ca/biph ou
              écrivez-nous au </a
            ><a href="mailto:Biph@uqo.ca" class="s9" target="_blank"
              >Biph@uqo.ca</a
            >
          </p>
        </td>
      </tr>
      <tr style="height: 17pt">
        <td
          style="
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
          bgcolor="#000066"
        >
          <p
            class="s1"
            style="padding-top: 2pt; text-indent: 0pt; text-align: left"
          >
            8. Principales références :
          </p>
        </td>
      </tr>
      <tr style="height: 214pt">
        <td
          style="
            padding-left: 6pt;
            font-size: 9pt;
            padding-bottom: 7pt;
            width: 569pt;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
        >
        <p
                class="s5"
                style="
                  padding-top: 7pt;
                  padding-left: 36pt;
                  text-indent: -17pt;
                  line-height: 12pt;
                  text-align: left;
                "
              >
                {!! $data['biographies'] !!}
              </p>
        </td>
      </tr>
      <tr style="height: 17pt">
        <td
          style="
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
          bgcolor="#000066"
        >
          <p
            class="s1"
            style="padding-top: 2pt; text-indent: 0pt; text-align: left"
          >
            9. Page Web du cours :
          </p>
        </td>
      </tr>
      <tr style="height: 23pt">
        <td
          style="
            padding-bottom: 5pt;
            width: 569pt;
            border-top-style: solid;
            border-top-width: 1pt;
            border-top-color: #000001;
            border-left-style: solid;
            border-left-width: 1pt;
            border-left-color: #000001;
            border-bottom-style: solid;
            border-bottom-width: 1pt;
            border-bottom-color: #000001;
            border-right-style: solid;
            border-right-width: 1pt;
            border-right-color: #000001;
          "
          colspan="3"
        >
          <p
            style="
              padding-top: 5pt;
              padding-left: 6pt;
              text-indent: 0pt;
              text-align: left;
            "
          >
            <a href="http://moodle.uqo.ca/course/view.php?id=20893" class="s6"
              >http://moodle.uqo.ca</a
            >
          </p>
        </td>
      </tr>
    </table>
  </body>
</html>
