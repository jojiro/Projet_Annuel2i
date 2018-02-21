/*
 * QR Code generator demo (C)
 *
 * Run this command-line program with no arguments. The program
 * computes a demonstration QR Codes and print it to the console.
 *
 * Copyright (c) Project Nayuki. (MIT License)
 * https://www.nayuki.io/page/qr-code-generator-library
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of
 * this software and associated documentation files (the "Software"), to deal in
 * the Software without restriction, including without limitation the rights to
 * use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 * the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 * - The above copyright notice and this permission notice shall be included in
 *   all copies or substantial portions of the Software.
 * - The Software is provided "as is", without warranty of any kind, express or
 *   implied, including but not limited to the warranties of merchantability,
 *   fitness for a particular purpose and noninfringement. In no event shall the
 *   authors or copyright holders be liable for any claim, damages or other
 *   liability, whether in an action of contract, tort or otherwise, arising from,
 *   out of or in connection with the Software or the use or other dealings in the
 *   Software.
 */

#include <stdbool.h>
#include <stddef.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "qrcodegen.h"
//bibliotheques bdd
#include <winsock.h>
#include <MYSQL/mysql.h>

// STRUCTURES
typedef struct db_params{
    MYSQL *mysql;
    MYSQL_RES *result;
}db_params;


// Function prototypes
static void doBasicDemo(db_params *db,char **argv);
static void printQr(const uint8_t qrcode[]);


// The main application program.
int main(int argc, char **argv) {

    if(argc>2){
        printf("Nombre d'arguments incorrecte \n il ne faut que l'identifiant de la personne créer, en argument. Merci.\n");
        return -1;
    }
    // ici c'est juste un test à commenter par la suite.
    // on print l'identifiant pour voir si il correspond
    printf("identifiant : %c \n", *(argv + 1));

    //Déclaration du pointeur de structure de type MYSQL
    MYSQL *mysql = NULL;
    // Déclaration des objets pour db_params db
    MYSQL_RES *result = NULL;

    //Initialisation de MySQL
    mysql = mysql_init(mysql);
    //Options de connexion
    mysql_options(mysql,MYSQL_READ_DEFAULT_GROUP,"option");

    //Si la connexion réussie...

    if(mysql_real_connect(mysql,"localhost","root","","projet_annuel",0,NULL,0)) // le nom de la bdd c'est projet_annuel
    { // pour les MAC le mot de passe pour la bdd est "root" et pas ""
        mysql_close(mysql);
    }
    else
    {
        printf("Une erreur s'est produite lors de la connexion à la BDD!");
    }

    // Initialisation d'une structure pour les informations de connexion en bdd
    db_params db = { .mysql = mysql, .result = result};

	doBasicDemo(&db,argv); // ici il y a un soucis pour passer en argument argv qui est double pointeur.

    mysql_close(mysql);
    mysql_free_result(result);
	return EXIT_SUCCESS;
}



/*---- A modifier à convenance ----*/

// Creates a single QR Code, then prints it to the console.
static void doBasicDemo(db_params *db,char **argv) {

    char *identifiant;
    identifiant = malloc(sizeof(char)*20);
    identifiant = argv[1];
    char request[100] = "SELECT id_client FROM CLIENT WHERE id_client=";
    strcat(request, identifiant);

    mysql_query(db->mysql, request);

    db->result = mysql_use_result(db->mysql);
    if(db->result == NULL){
        printf("There is no result\n");
    }else{

	const char *text = db->result;  // Changer ici pour ce que je veux metre dans le qrcode ( identifiant de la personne + token par la suite )
	enum qrcodegen_Ecc errCorLvl = qrcodegen_Ecc_LOW;  // Error correction level

	// Make and print the QR Code symbol
	uint8_t qrcode[qrcodegen_BUFFER_LEN_MAX];
	uint8_t tempBuffer[qrcodegen_BUFFER_LEN_MAX];
	bool ok = qrcodegen_encodeText(text, tempBuffer, qrcode, errCorLvl,
		qrcodegen_VERSION_MIN, qrcodegen_VERSION_MAX, qrcodegen_Mask_AUTO, true);
	if (ok)
		printQr(qrcode);
    }
}

/*---- Utilities ----*/

// Prints the given QR Code to the console.
static void printQr(const uint8_t qrcode[]) {
	int size = qrcodegen_getSize(qrcode);
	int border = 4;
	for (int y = -border; y < size + border; y++) {
		for (int x = -border; x < size + border; x++) {
			fputs((qrcodegen_getModule(qrcode, x, y) ? "##" : "  "), stdout); // remplacer ## par pixel noir et espace par pixel blanc
		}                                                                     // trouver une librairie de conversion en image
		fputs("\n", stdout);
	}
	fputs("\n", stdout);
}

/* ----- functions database -----*/
