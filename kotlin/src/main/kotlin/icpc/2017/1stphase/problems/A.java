import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.*;

public class A {
    static class FastReader
    {
        BufferedReader br;
        StringTokenizer st;

        public FastReader()
        {
            br = new BufferedReader(new
                    InputStreamReader(System.in));
        }

        String next()
        {
            while (st == null || !st.hasMoreElements())
            {
                try
                {
                    st = new StringTokenizer(br.readLine());
                }
                catch (IOException  e)
                {
                    e.printStackTrace();
                }
            }
            return st.nextToken();
        }

        int nextInt()
        {
            return Integer.parseInt(next());
        }

        long nextLong()
        {
            return Long.parseLong(next());
        }

        double nextDouble()
        {
            return Double.parseDouble(next());
        }

        String nextLine()
        {
            String str = "";
            try
            {
                str = br.readLine();
            }
            catch (IOException e)
            {
                e.printStackTrace();
            }
            return str;
        }
    }

    public static void main(String[] args) throws IOException {
        FastReader s = new FastReader();
        // String[] numbers = s.nextInt();
        int N = s.nextInt();
        int Q = s.nextInt();

        HashMap<Integer, Integer> t = new HashMap<>();

        for (int i = 0; i < N; i++) {
            t.put(i, 1);
        }
        HashMap<Integer, Integer> freqIndex = new HashMap<>();

        for (int i = 0; i < Q; i++) {
            int A = s.nextInt();
            int B = s.nextInt();

            // get most frequently
            for (int f = 0; f < 9; f++) {
                freqIndex.put(f, 0);
            }
            for (int j = A; j <= B; j++) {
                int noteValue = t.get(j);
                freqIndex.put(noteValue, freqIndex.get(noteValue)+1);
            }

            // get most appear index
            int mostAppearIndex = 0;
            for (int j = 0; j < 9; j++) {
                if (freqIndex.get(j) > (int) freqIndex.get(mostAppearIndex)) mostAppearIndex = j;
            }

            // Get mostAppear index based on upper value
            for (int j = 0; j < 9; j++) {
                if (freqIndex.get(j).equals(freqIndex.get(mostAppearIndex))) {
                    if (j > mostAppearIndex) {
                        mostAppearIndex = j;
                    }
                }
            }
            for (int j = A; j <= B; j++) {
                int newValueOfNote = (t.get(j) + mostAppearIndex) % 9;
                t.put(j, newValueOfNote);
            }
        }
        for (int index = 0; index < t.size(); index++) {
            System.out.println(t.get(index));
        }
    }
}