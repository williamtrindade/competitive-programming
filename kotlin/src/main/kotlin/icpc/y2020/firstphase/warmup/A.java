package icpc.y2020.firstphase.warmup;

import java.io.IOException;
import java.util.Scanner;

public class A {
    public static void main(String[] args) throws IOException {
        Scanner in = new Scanner(System.in);
        int C = in.nextInt();
        int A =  in.nextInt();

        float result = A / (C-1f);

        System.out.println((int) Math.ceil(result));
        in.close();
    }
}
