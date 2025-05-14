## About project

The plan-de-cours-uqo project aims to digitize and optimize the process of creating, validating and tracking syllabus within the Computer Science and Engineering Department of the Université du Québec en Outaouais (UQO). Currently based on a manual exchange of documents by e-mail, this process generates numerous errors and a heavy administrative burden for teachers and the module secretary. The proposed system responds to this need by offering a centralized, intuitive and partially automated web platform, where teachers can generate, submit and modify their lesson plans within a structured validation flow involving the module secretary and director.

The prototype developed is based on a modern architecture combining React, TypeScript, Tailwind CSS, Laravel and SQLite. It enables the automated generation of documents in compliance with corporate rules, while reducing the risk of recurring errors thanks to the framing of input data. 

## How it works

The website uses role-based access control to determine which functionalities are available to each user. This ensures that the workflow is followed correctly from start to finish.

**User Roles**:

`prof`: Submits syllabus creation requests.

`secretary`: Reviews submitted requests, either approving or rejecting them. May leave a comment for revision.

`director`: Gives the final approval or rejection for requests that have been accepted by the secretary. May also leave a comment.

`admin`: Has full access to the system and can manage user accounts, roles, and system configurations.

**Workflow**:

`prof submits a request → secretary approves or rejects it → director approves or rejects it`

## How to run

 1. Clone the repository
    
    ```
    > git clone https://github.com/Santiago-Soto-21/plan-de-cours-uqo.git
    ```

2. Execute `npm install -y`
    ```
    > npm install -y
    ```

3. Execute `npm install -g http-server`
    ```
    > npm install -g http-server
    ```

4. Execute `npm run dev` to start server
    ```
    > npm run dev
    ```

5. Travel to `resources/views/UQO-PLAN-DE-COURS/` and execute `http-server ./` to start HTTP server
    ```
    > cd resources/views/UQO-PLAN-DE-COURS/
    > http-server ./
    ```

6. Open your page to http://localhost:8080/ in your browser

7. Login using any of the following test accounts:

- **Admin account**  
  *Email:* `admin@example.com`  
  *Password:* `password`

- **Director account**  
  *Email:* `director@example.com`  
  *Password:* `password`

- **Secretary account**  
  *Email:* `secretary@example.com`  
  *Password:* `password`

- **Professor account**  
  *Email:* `prof@example.com`  
  *Password:* `password`