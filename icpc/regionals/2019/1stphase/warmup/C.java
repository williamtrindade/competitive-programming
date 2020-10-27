import java.util.Scanner;

public class C {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int A = in.nextInt();
        int M = in.nextInt();
        int TOTAL = (M * 100) / 50; // Get total note
        int X  = TOTAL - A;         // Remove the Fst note
        System.out.println(X);
        in.close();
    }
}