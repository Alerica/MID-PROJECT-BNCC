#include <stdio.h>

// Code made by Stanley Pratama Teguh NIM: 2702311566 with help from stackoverflow
#define MAX_ROWS 4000
#define MAX_COLS 8

typedef struct {
    char location[50];
    char city[50];
    int price;
    int rooms;
    int bathroom;
    int carpark;
    char type[50];
    char furnish[50];
} Property;


void displayData(Property data[], int numRows);
int readCSVFile(Property data[], const char *filename);
int my_strcmp(const char *s1, const char *s2);
int my_strstr(const char *haystack, const char *needle);

void selectRow(Property data[], int numRows, const char *column, const char *query);


void sortBy(Property data[], int numRows, const char *column, const char *order);
void exportData(Property data[], int numRows, const char *filename);
int isAlphaNumeric(const char *str);
void replaceSpacesWithUnderscores(char *str);

void clearScreen() {
    printf("\033[2J\033[H");
}

void delay(int seconds) {
    int i, j;
    for (i = 0; i < seconds; ++i) {
        for (j = 0; j < 100000000; ++j) {
            // Delay
        }
    }
}

void exitLoadingScreen() {
    printf("Exiting the program");
    fflush(stdout);

    for (int i = 0; i < 3; ++i) {
        printf(".");
        fflush(stdout);
        delay(3);  // 3 seconds
    }

    printf("\n");
}

int main() {
    Property data[MAX_ROWS];
    int totalRows = readCSVFile(data, "file.csv");

    if (totalRows == -1) {
        printf("Error reading the CSV file.\n");
        return 1;
    }

    int choice;
    char column[50];
    char query[50];
    char order[4];
    char exportFilename[50];

    do {
        printf("What do you want to do?\n"); 
        printf("1. Display data\n");
        printf("2. Search Data\n");
        printf("3. Sort Data\n");
        printf("4. Export Data\n");
        printf("5. Exit\nYour choice: ");
        scanf("%d", &choice);

        switch (choice) {
            case 1:
                printf("Number of rows: ");
                int numRows;
                scanf("%d", &numRows);
                displayData(data, numRows);
                break;
            case 2:
                printf("Choose column: ");
                scanf("%s", column);
                printf("What data do you want to find? ");
                scanf("%s", query);
                selectRow(data, totalRows, column, query);
                break;
            case 3:
                printf("Choose column: ");
                scanf("%s", column);
                printf("Sort ascending (asc) or descending (desc)? ");
                scanf("%s", order);
                sortBy(data, totalRows, column, order);
                break;
            case 4:
                printf("File name: ");
                scanf(" %s", exportFilename);
                exportData(data, totalRows, exportFilename);
                break;
            case 5:
                break;
            default:
                printf("Invalid choice.\n");
                break;
        }

    if (choice != 5) {
            printf("\nPress Enter to continue...");
            while (getchar() != '\n')
                ; 
            while (getchar() != '\n')
                ; // Consume characters until newline
             clearScreen();
        }

    } while (choice != 5);

    exitLoadingScreen();

    return 0;
}

// Code made by Stanley Pratama Teguh NIM: 2702311566 with help from stackoverflow
void displayData(Property data[], int numRows) {
    printf("\n%-28s%-20s%-15s%-12s%-15s%-15s%-15s%s\n", "Location", "City", "Price", "Rooms", "Bathroom", "Carpark", "Type", "Furnish");

    for (int i = 0; i < numRows && i < MAX_ROWS; i++) {
        printf("%-28s%-20s%-15d%-12d%-15d%-15d%-15s%s\n",
               data[i].location, data[i].city, data[i].price,
               data[i].rooms, data[i].bathroom, data[i].carpark,
               data[i].type, data[i].furnish);
    }
}




// Function to compare two strings
int my_strcmp(const char *s1, const char *s2) {
    while (*s1 && *s2 && *s1 == *s2) {
        s1++;
        s2++;
    }
    return (*s1 - *s2);
}

// Function to find substring in a string
int my_strstr(const char *haystack, const char *needle) {
    while (*haystack) {
        const char *h = haystack;
        const char *n = needle;

        while (*h && *n && *h == *n) {
            h++;
            n++;
        }

        if (!*n) {
            return 1;  // Found
        }

        haystack++;
    }

    return 0;  // Not found
}

int my_atoi(const char *str) {
    int result = 0;
    int sign = 1;

    while (*str == ' ' || (*str >= 9 && *str <= 13)) {
        str++;
    }

    if (*str == '-' || *str == '+') {
        sign = (*str++ == '-') ? -1 : 1;
    }

    while (*str >= '0' && *str <= '9') {
        result = result * 10 + (*str++ - '0');
    }

    return sign * result;
}

void selectRow(Property data[], int numRows, const char *column, const char *query) {
    int found = 0;

    for (int i = 0; i < numRows && i < MAX_ROWS; i++) {
        int columnMatch = 0;

        if (column[0] == 'L' && column[1] == 'o' && column[2] == 'c' && column[3] == 'a' && column[4] == 't' && column[5] == 'i' && column[6] == 'o' && column[7] == 'n' && column[8] == '\0') {
            columnMatch = my_strstr(data[i].location, query);
        } else if (column[0] == 'C' && column[1] == 'i' && column[2] == 't' && column[3] == 'y' && column[4] == '\0') {
            columnMatch = my_strstr(data[i].city, query);
        } else if (column[0] == 'T' && column[1] == 'y' && column[2] == 'p' && column[3] == 'e' && column[4] == '\0') {
            columnMatch = my_strstr(data[i].type, query);
        } else if (column[0] == 'P' && column[1] == 'r' && column[2] == 'i' && column[3] == 'c' && column[4] == 'e' && column[5] == '\0') {
            columnMatch = (data[i].price == my_atoi(query));
        } else if (column[0] == 'R' && column[1] == 'o' && column[2] == 'o' && column[3] == 'm' && column[4] == 's' && column[5] == '\0') {
            columnMatch = (data[i].rooms == my_atoi(query));
        } else if (column[0] == 'B' && column[1] == 'a' && column[2] == 't' && column[3] == 'h' && column[4] == 'r' && column[5] == 'o' && column[6] == 'o' && column[7] == 'm' && column[8] == '\0') {
            columnMatch = (data[i].bathroom == my_atoi(query));
        } else if (column[0] == 'C' && column[1] == 'a' && column[2] == 'r' && column[3] == 'p' && column[4] == 'a' && column[5] == 'r' && column[6] == 'k' && column[7] == '\0') {
            columnMatch = (data[i].carpark == my_atoi(query));
        } else if (column[0] == 'F' && column[1] == 'u' && column[2] == 'r' && column[3] == 'n' && column[4] == 'i' && column[5] == 's' && column[6] == 'h' && column[7] == '\0') {
            columnMatch = my_strstr(data[i].furnish, query);
        }

       if (columnMatch) {
   		 if (!found) {
       	 printf("Data found. Detail of data:\n");
        	printf("%-28s%-20s%-15s%-12s%-15s%-15s%-15s%s\n", "Location", "City", "Price", "Rooms", "Bathroom", "Carpark", "Type", "Furnish");
       		found = 1;
   		 }

    	printf("%-28s%-20s%-15d%-12d%-15d%-15d%-15s%s\n",
           data[i].location, data[i].city, data[i].price,
           data[i].rooms, data[i].bathroom, data[i].carpark,
           data[i].type, data[i].furnish);
		}

    }

    if (!found) {
        printf("Data not found!\n");
    }
}


// Code made by Stanley Pratama Teguh NIM: 2702311566 with help from stackoverflow


void sortBy(Property data[], int numRows, const char *column, const char *order) {
    int i, j;
    Property temp;

    for (i = 0; i < numRows - 1; i++) {
        for (j = 0; j < numRows - i - 1; j++) {
            int compareResult;

            if (column[0] == 'L' && column[1] == 'o' && column[2] == 'c' && column[3] == 'a' && column[4] == 't' && column[5] == 'i' && column[6] == 'o' && column[7] == 'n' && column[8] == '\0') {
                compareResult = my_strcmp(data[j].location, data[j + 1].location);
            } else if (column[0] == 'C' && column[1] == 'i' && column[2] == 't' && column[3] == 'y' && column[4] == '\0') {
                compareResult = my_strcmp(data[j].city, data[j + 1].city);
            } else if (column[0] == 'P' && column[1] == 'r' && column[2] == 'i' && column[3] == 'c' && column[4] == 'e' && column[5] == '\0') {
                compareResult = data[j].price - data[j + 1].price;
            } else if (column[0] == 'R' && column[1] == 'o' && column[2] == 'o' && column[3] == 'm' && column[4] == 's' && column[5] == '\0') {
                compareResult = data[j].rooms - data[j + 1].rooms;
            } else if (column[0] == 'B' && column[1] == 'a' && column[2] == 't' && column[3] == 'h' && column[4] == 'r' && column[5] == 'o' && column[6] == 'o' && column[7] == 'm' && column[8] == '\0') {
                compareResult = data[j].bathroom - data[j + 1].bathroom;
            } else if (column[0] == 'C' && column[1] == 'a' && column[2] == 'r' && column[3] == 'p' && column[4] == 'a' && column[5] == 'r' && column[6] == 'k' && column[7] == '\0') {
                compareResult = data[j].carpark - data[j + 1].carpark;
            } else if (column[0] == 'T' && column[1] == 'y' && column[2] == 'p' && column[3] == 'e' && column[4] == '\0') {
                compareResult = my_strcmp(data[j].type, data[j + 1].type);
            } else if (column[0] == 'F' && column[1] == 'u' && column[2] == 'r' && column[3] == 'n' && column[4] == 'i' && column[5] == 's' && column[6] == 'h' && column[7] == '\0') {
                compareResult = my_strcmp(data[j].furnish, data[j + 1].furnish);
            } else {
                printf("Invalid column selected for sorting.\n");
                return;
            }

            if ((order[0] == 'a' && order[1] == 's' && order[2] == 'c' && order[3] == '\0' && compareResult > 0) ||
                (order[0] == 'd' && order[1] == 'e' && order[2] == 's' && order[3] == 'c' && order[4] == '\0' && compareResult < 0)) {
                temp = data[j];
                data[j] = data[j + 1];
                data[j + 1] = temp;
            }
        }
    }

    printf("Data found. Detail of data:\n");
    displayData(data, 10);
}


int readCSVFile(Property data[], const char *filename) {
    FILE *file = fopen(filename, "r");
    if (file == NULL) {
        return -1;
    }

    char line[500];
    int row = 0;

    if (fgets(line, sizeof(line), file) == NULL) {
        fclose(file);
        return -1;
    }

    while (fgets(line, sizeof(line), file) != NULL && row < MAX_ROWS) {
        int result = sscanf(line, "%49[^,],%49[^,],%d,%d,%d,%d,%49[^,],%49[^\n]",
               data[row].location, data[row].city, &data[row].price,
               &data[row].rooms, &data[row].bathroom, &data[row].carpark,
               data[row].type, data[row].furnish);

        if (result != 8) {
            // Handle invalid data format
            fclose(file);
            return -1;
        }

        row++;
    }

    fclose(file);
    return row;
}
int isAlphaNumeric(const char *str) {
    while (*str) {
        if ((*str >= 'a' && *str <= 'z') || (*str >= 'A' && *str <= 'Z') || (*str >= '0' && *str <= '9')) {
            str++;
        } else {
            return 0;
        }
    }
    return 1;
}


void replaceSpacesWithUnderscores(char *str) {
    while (*str) {
        if (*str == ' ') {
            *str = '_';
        }
        str++;
    }
}


void exportData(Property data[], int numRows, const char *filename) {
    FILE *file;
    char outputFilename[1000];

    // Check for spaces in the filename
    for (const char *ptr = filename; *ptr; ++ptr) {
        if (*ptr == ' ') {
            printf("Invalid filename. Please avoid spaces.\n");
            return;
        }
    }

    // Create the output filename
    snprintf(outputFilename, sizeof(outputFilename), "%s.csv", filename);

    // Check if the output file already exists
    file = fopen(outputFilename, "r");
    if (file != NULL) {
        fclose(file);
        printf("File '%s' already exists. Please choose a different filename.\n", outputFilename);
        return;
    }

    file = fopen(outputFilename, "w");
    if (file == NULL) {
        printf("Error creating or opening the file.\n");
        return;
    }

    fprintf(file, "Location,City,Price,Rooms,Bathroom,Carpark,Type,Furnish\n");

    for (int j = 0; j < numRows && j < MAX_ROWS; j++) {
        fprintf(file, "%s,%s,%d,%d,%d,%d,%s,%s\n",
               data[j].location, data[j].city, data[j].price,
               data[j].rooms, data[j].bathroom, data[j].carpark,
               data[j].type, data[j].furnish);
    }

    fclose(file);
    printf("Data successfully written to file %s!\n", outputFilename);
}
// Code made by Stanley Pratama Teguh NIM: 2702311566 with help from stackoverflow
