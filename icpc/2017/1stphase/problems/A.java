import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;


public class A {
    public static void main(String[] args) throws IOException {
        Scanner in = new Scanner(System.in);
        int N = in.nextInt();
        int Q = in.nextInt();
        ArrayList<Tuple<Integer,Integer>> tuple = new ArrayList<>();
        Map<Integer, Integer> map = new HashMap<Integer, Integer>();

        int vet[] = new int[N];

        for( int i = 0; i < Q; i++ ) {
            int A = in.nextInt();
            int B = in.nextInt();

            for ( int j = A; j <= B; j++) {
                int value = vet[j];
                
                for (int i = 0; i < tuple.size(); i++) {
                    if (tuple.get(i).getX() == value) {
                        tuple.get(i).setY(tuple.get(i).getY()+1);
                    }
                    else {
                        tuple.add(new Tuple(value, 1));
                    }
                }
                Tuple<Integer,Integer> bigger = new Tuple<Integer,Integer>(-1,0);
                for (int i = 0; i < tuple.size(); i++) {
                    if (tuple.get(i).getY() > bigger.getValue(1)) {
                        bigger.setValue(1)
                    }
                }
            }
        }    
         
        System.out.println(N);

        in.close();
    }
}