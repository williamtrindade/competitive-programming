#include <stdio.h>
int main() {
 
    /**
     * Escreva a sua solução aqui
     * Code your solution here
     * Escriba su solución aquí
     */
     
    //area = p . raio2
	
	double raio, area, n = 3.14159;
	
	scanf("%lf", &raio);
	
	area = (raio * raio) * n;
	
	printf("A=%.4lf\n", area);
	
	return 0;
	
}
