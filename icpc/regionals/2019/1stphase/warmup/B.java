import java.util.Scanner;

public class B {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int N = in.nextInt();
        int leastFactorialsAmount = 0;
        int sum = 0;
        for(long i = N; i > 0; i--) {
            long factorial = factorial(i);
            if ((factorial + sum) <= N && factorial > 0) {
                sum += factorial;
                leastFactorialsAmount ++;
                if ((factorial + sum) <= N) {
                    i++;
                }
            }
            if (sum == N) break;
        }
        if (sum == N) {
            System.out.println(leastFactorialsAmount);
        }
        in.close();
    }

    public static Long factorial(Long n) {
        long result = n;
        for (long i=n-1; i > 0; i--) {
            result = result * i;
        }
        return result;
    }
}
