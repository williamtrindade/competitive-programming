import java.util.Scanner;

public class B {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int C = in.nextInt();
        int i;
        for (i = 1; (factorial(i) < C); i++);
        i--;
        int resposta = 0;
        int aux = 0;
        while (aux != C) {
            if (aux + factorial(i) <= C) {
                aux = aux + factorial(i);
                resposta++;
            } else i--;
        }

        System.out.println(resposta);
        in.close();
    }

    public static int factorial(int n) {
        int result = 1;
        for (int i = n; i > 1; i--) {
            result *= i;
        }
        return result;
    }
}
// 10 9 8 7 6 5 4 3 2 1