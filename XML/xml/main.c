#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <winsock.h>
#include <MYSQL/mysql.h>
#include <libxml/encoding.h>
#include <libxml/xmlwriter.h>

// STRUCTURES
typedef struct db_params{
    MYSQL *mysql;
    MYSQL_RES *result;
    MYSQL_ROW *row;
}db_params;


/* ------------------- Main -------------------*/
int main ( int argc , char **argv){
    int value = atoi(argv[2]); // identifiant
	/* ------------------------- INITIALISATION BDD ------------------*/
    MYSQL *database = NULL;
    database = mysql_init(database);

    if(database == NULL){
        printf("\nProblem while initializing database !\n");
        return  0;
    }
    /* -------------------------------------------------------------*/
    mysql_options(database, MYSQL_READ_DEFAULT_GROUP, "option");

 	/* ------------------ CONNEXION BDD ----------------*/
    if(mysql_real_connect(database, "localhost", "root", "", "projet_annuel", 0, NULL, 0)){

        // Déclaration des objets
        MYSQL_RES *result = NULL;
        MYSQL_ROW row = NULL;
    /* -------------------------------------------------------*/

    /* --------------------------- Ouverture et Manipulation Fichier -------------------*/
  	FILE* file;
	file = fopen(argv[1], " r+ " ); // argv[1] contient le nom du workshop.
	if(file==NULL){
		file = fopen(argv[1], " w+ " );
	}

	/* --------------------------------------------------------*/


}
/* --------------------------------------------*/
}
