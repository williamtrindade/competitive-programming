package icpc.y2019.firstphase.warmup;

import java.io.IOException;
import java.util.Scanner;

class A {
    public static void main(String[] args) throws IOException {
        Scanner in = new Scanner(System.in);
        int c = in.nextInt();
        int a =  in.nextInt();
        int travels = (a / (c - 1));
        int rest = (a % (c - 1));
        if (rest > 0) {
            travels++;
        }
        System.out.print(travels);
        in.close();
    }
}