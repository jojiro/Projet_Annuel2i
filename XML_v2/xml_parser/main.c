//dernier prog c etape
#include <stdio.h>
#include <stdlib.h>
#include <winsock.h>
#include <MYSQL/mysql.h>
#include <windows.h>
#include <libxml/parser.h>
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
    char *lieu;
    FILE *file = NULL;
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
    }
    else{
        printf("Database connection error.\n");
    }

    printf("\nPlease type the location of the workspace \nto launch the app \n");
    fgets(lieu, SIZE,stdin);

    /* si la taille de la chaîne est inférieure à la taille de tableau, alors '\n' fera son apparition, le code ci-dessous est la solution */
    int i = 0;
    while( lieu[i] != '\0' && lieu[i] != '\n' ){
        i++;
    }
    lieu[i] = '\0';



    do{
        printf("\n------------------------------\n");
        printf("Type (0) to quit and save file\n");
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


                char request[100] = "SELECT name,surname FROM users WHERE user_key = '";
                strcat(request,key_value);
                strcat(request,"'");
                //printf("ok");
                mysql_query(&mysql,request);
                //printf("ok");
                result = mysql_use_result(&mysql);
                row = mysql_fetch_row(result);

                if(row[0] != NULL){
                    mysql_free_result(result);

                    time_t actTime;
                    struct tm *timeComp;
                    char date[50] = {NULL};

                    time(&actTime); // nombre de seconde depuis 1900
                    timeComp = localtime(&actTime);
                    sprintf(date,"%02d-%02d-%d", timeComp ->tm_mday, timeComp->tm_mon + 1, timeComp->tm_year + 1900);
                    strcat(date,lieu);
                    strcat(date,".xml");
                    /* ici date contient le nom complet du fichier .xml maintenant */

                    if ((file = fopen(date,"r")) == NULL ){
                        /* fonction create XML */
                        CreateDirectory(DOCPATH,NULL);
                        createXML(date,lieu);
                    }else{
                        fclose(file);
                        /* fonction charger XML */
                        char request2[100]="SELECT boolean_key FROM users WHERE user_key='";
                        strcat(request2,key_value);
                        strcat(request2,"'");

                        mysql_query(&mysql, request2);
                        result = mysql_use_result(&mysql);
                        row = mysql_fetch_row(result);

                        if(row[0] == 0){
                            strcpy(entry_exit,"entry");
                        }else{
                            strcpy(entry_exit,"exit");
                        }
                        InsertXMLData(key_value,date,entry_exit);
                    }

                }else{
                    printf("\nYour key is undefined.\n");
                }
                        }
    }while( menu != 0 );
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
