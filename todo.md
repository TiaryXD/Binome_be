#Base 
installing the repository
Testing

#Git
creation depot sur GitHub
Ajout du binome (repo → Settings → Collaborators)
Cloner le dépôt

#pages
    - fonction.php :
        - fonction :
            - [x] db_connect() : connexion a la base
            - [x] get_Depart() : Prends les departements grace a un select de la base
            - [x] get_Manager() : Prends les manager grace a un select
            - [x] get_liste_empl() : prendre la liste des employees grace a un select 
            - [x] get_one_empl() : prendre 1 employees par rapport au no

        - base : 
            - [x] utiliser la base : employees
            - [x] utilisation du tableau : departments
            - [x] utilisation du tableau : dept_manager
    
    - index.php :
        - affichage :
            - [x] utiliser bootstrap
            - [x] tableau affichant les numeros des departements, les departements et les managers
            - [x] lien sur le code des departements

        - base :
            - 

        - integration :
            - [x] utiliser la fonction get_Depart pour mettre les donnees dans le tableau 
            - [x] utiliser la fonction get_Manager pour mettre les nos des managers a cote

    - liste.php : 
        - affichage : 
            - [x] tableau pour afficher les infos des employees
            - [x] lien sur chaque nom d'employees

        - fonction :
            - [x] get_liste_empl : prendre la liste des employees par departements

        - base :
            - [x] join la base employees, departments et dept_emp

        - integration:
            - [x] mettre les ids des employees sur les liens sur les noms

    - fiche.php : 
        - affichage :
            - [x] tableau pour afficher les infos de l'employees

        - fonction :
            - [x] get_one_temp : prendre l'employee 

        - base :
            - [x] join la base salaries, dept_emp, departments, employees

        -integration :
            - [x] utiliser la fonction get_one_temp() pour montrer les infos correspondant a l'employee 

