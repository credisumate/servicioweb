%{
#include <stdio.h>
%}

DIGITO      [0-9]

%%

{DIGITO}+   { printf("ENTERO: %s\n", yytext); }
[ \t\n]     ;  // Ignorar espacios en blanco y saltos de línea
"+"         { printf("OPERADOR: SUMA\n"); }
"-"         { printf("OPERADOR: RESTA\n"); }
"*"         { printf("OPERADOR: MULTIPLICACION\n"); }
"/"         { printf("OPERADOR: DIVISION\n"); }
.           { printf("Caracter no reconocido: %s\n", yytext); }

%%

int main() {
    yylex();
    return 0;
}