#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <winsock.h>
#include <MYSQL/mysql.h>
#include <windows.h>
#include <libxml/parser.h>
#include <libxml/xmlreader.h>
#include <libxml/tree.h>
#include <time.h>


#define SIZE 50
#define MY_ENCODING "ISO-8859-1"
#define DOCPATH "../XMLDOCS/"


void createXML(char *date,char *lieu);
void InsertXMLData(char *key_value,char *date, char *entry_exit);

int main(int argc,char **argv)
{
    int menu;
    int c;
    xmlTextReaderPtr reader;

    char *lieu;
    lieu = malloc(sizeof(char)*(SIZE) );
    if (lieu == NULL){
        printf("allocation error \n");
    }
    char *entry_exit;
    entry_exit = malloc(sizeof(char)*(SIZE) );
    if (entry_exit == NULL){
        printf("allocation error \n");
    }

    /* Connexion en BDD */
    MYSQL mysql;
    mysql_init(&mysql);
    mysql_options(&mysql,MYSQL_READ_DEFAULT_GROUP,"option");

    if(mysql_real_connect(&mysql,"localhost","root","","worknshare",0,NULL,0)){
        printf("Connection to Database OK\n");
    }
    else{
        printf("Database connection error.\n");
    }

    printf("\nPlease type the location of the workspace IN CAPS everytime you launch the app.\nit will be the file name suffix \n...\n\n");
    fgets(lieu, SIZE,stdin);

    /* si la taille de la chaîne est inférieure à la taille de tableau, alors '\n' fera son apparition, le code ci-dessous est la solution */
    int i = 0;
    while( lieu[i] != '\0' && lieu[i] != '\n' ){
        i++;
    }
    lieu[i] = '\0';

    time_t actTime;
    struct tm *timeComp;
    char date[50] = {NULL};

    time(&actTime); // nombre de seconde depuis 1900
    timeComp = localtime(&actTime);
    sprintf(date,"%02d-%02d-%d", timeComp ->tm_mday, timeComp->tm_mon + 1, timeComp->tm_year + 1900);
    strcat(date,lieu);
    strcat(date,".xml");
    /* ici date contient le nom complet du fichier .xml maintenant */

    /* fonction create XML */
    //CreateDirectory(DOCPATH,NULL);
    createXML(date,lieu);
    printf("XML CREATED \n");

    do{
        printf("\n------------------------------\n");
        printf("Type (0) to quit\n");
        printf("Type (1) to type your key.\n");
        scanf("%d",&menu);

        /* Vider le buffer du scanf */
        while((c = getchar()) != EOF && c != '\n');
        printf("value of menu : %d\n",menu);

            if(menu==1){

                char *key_value;
                key_value = malloc(sizeof(char)*(SIZE) );
                if (key_value == NULL){
                    printf("erreur allocation \n");
                }

                printf("\nPlease type your key \n");
                fgets(key_value,SIZE,stdin);
                printf("Your key is : ");

                /* si la taille de la chaîne est inférieure à la taille de tableau, alors '\n' fera son apparition, le code ci-dessous est la solution */
                int i = 0;
                while( key_value[i] != '\0' && key_value[i] != '\n' ){
                    printf("%c",key_value[i]);
                    i++;
                }
                key_value[i] = '\0';
                printf("\n");

                /* Checking en BDD si la clef correspond à un user */
                MYSQL_RES *result = NULL;
                MYSQL_ROW row;


                char request[100] = "SELECT name,surname FROM users WHERE user_key ='";
                strcat(request,key_value);
                strcat(request,"'");
                mysql_query(&mysql, request);

                result = mysql_use_result(&mysql);
                row = mysql_fetch_row(result);

                if(row[0] != NULL){
                    mysql_free_result(result);
                    /* pour vider le tableau request et le reutiliser apres*/
                    request[0]= '\0';


                    reader = xmlReaderForFile(date, NULL, 0);
                    if ( reader != NULL ){
                        /* fonction charger XML */
                        char request2[100]="SELECT boolean_key FROM users WHERE user_key='";
                        strcat(request2,key_value);
                        strcat(request2,"'");

                        mysql_query(&mysql, request2);
                        result = mysql_use_result(&mysql);
                        row = mysql_fetch_row(result);

                        if(row[0] == '0' || stricmp(row[0],"0") == 0){
                            strcpy(entry_exit,"entry");
                            request2[0]='\0';
                            mysql_free_result(result);
                        }else{
                            strcpy(entry_exit,"exit");
                            request2[0]='\0';
                            mysql_free_result(result);
                        }

                        char request3[100]="UPDATE users SET boolean_key = '0' WHERE user_key='";
                        strcat(request3,key_value);
                        strcat(request3,"'");

                        char request4[100]="UPDATE users SET boolean_key = '1' WHERE user_key='";
                        strcat(request4,key_value);
                        strcat(request4,"'");
                        /* stricmp pas sensible a la casse. */
                        if(stricmp(entry_exit,"exit")==0){
                            mysql_query(&mysql, request3);
                            request3[0]='\0';
                        }
                        if(stricmp(entry_exit,"entry")==0){
                            mysql_query(&mysql, request4);
                            request4[0]='\0';
                        }
                        InsertXMLData(key_value,date,entry_exit);
                        mysql_free_result(result);
                        free(key_value);
                        xmlFreeTextReader(reader);
                    }else{
                        printf("FILE not FOUND.\n ");
                        free(key_value);
                    }

                }else{
                    printf("\nYour key is undefined.\n");
                }
            }
            if(menu == 2){
                /* SANS CETTE CHOSE ICI CA PLANTE, INCROYABLE, on a deja tout ca en haut c'est inutile ici mais si je l'enleve ca plante dans tout les sens WTF?... */
                time_t actTime;
                struct tm *timeComp;
                char date[50] = {NULL};

                time(&actTime); // nombre de seconde depuis 1900
                timeComp = localtime(&actTime);
                sprintf(date,"%02d-%02d-%d", timeComp ->tm_mday, timeComp->tm_mon + 1, timeComp->tm_year + 1900);
                strcat(date,lieu);
                strcat(date,".xml");
                /* ici date contient le nom complet du fichier .xml maintenant */
                createXML(date,lieu);
            }
    }while( menu != 0 );
    free(lieu);
    free(entry_exit);
    mysql_close(&mysql);
    return 0;
}


void createXML(char *date,char *lieu){
    xmlDocPtr doc = NULL;/* document pointer */
    xmlNodePtr root_node = NULL;

    /*Creates a new document, a node and set it as a root node*/
    doc = xmlNewDoc(BAD_CAST "1.0");
    root_node = xmlNewNode(NULL, BAD_CAST "root");
    xmlDocSetRootElement(doc, root_node);
    xmlNewProp(root_node, BAD_CAST lieu, BAD_CAST date);
    /* Dumping document to stdio and file */
    xmlSaveFormatFileEnc(date, doc, "UTF-8", 1);
    xmlDocFormatDump(stdout,doc,1);

    /*free the document */
    xmlFreeDoc(doc);

    /*Free the global variables that may
     *have been allocated by the parser.
     */
    xmlCleanupParser();

    /*this is to debug memory for regression tests*/
    xmlMemoryDump();
    return;
}

void InsertXMLData(char *key_value,char *date, char *entry_exit){
    xmlDocPtr doc = NULL;
    xmlNodePtr root = NULL,data = NULL;

    doc = xmlReadFile(date, "UTF-8", 0);
    root = xmlDocGetRootElement(doc);

    data = xmlNewTextChild(root, NULL, "UserData",NULL);
    xmlNewTextChild(data,NULL,BAD_CAST "user_key",BAD_CAST key_value);
    xmlNewTextChild(data,NULL,BAD_CAST "In_Out",BAD_CAST entry_exit);

    xmlSaveFormatFileEnc(date, doc, "UTF-8", 1);
    xmlDocFormatDump(stdout,doc,1);
    /*free the document */
    xmlFreeDoc(doc);

    /*
     *Free the global variables that may
     *have been allocated by the parser.
     */
    xmlCleanupParser();

    /*
     * this is to debug memory for regression tests
     */
    xmlMemoryDump();
    return;
}
