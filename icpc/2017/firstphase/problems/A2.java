import java.io.BufferedReader;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.util.StringTokenizer;

public class A2 {

    static final int TREESZ = 1 << 18;
    static final int MOD = 9;

    static int[][] tree = new int[TREESZ][MOD];
    static int[] shift = new int[TREESZ];

    static void build(int node, int lo, int hi) {
        shift[node] = 0;

        if (lo == hi) {
            tree[node][1] = 1;
        } else {
            int ls = (node << 1) + 1;
            int rs = ls + 1;
            int mid = (lo + hi) >> 1;

            build(ls, lo, mid);
            build(rs, mid+1, hi);

            tree[node][1] = hi-lo+1;
        }
    }

    static int[] rotate_aux = new int[MOD];
    static void rotate(int[] v, int r) {
        r = MOD  - r;
        int j = 0;
        for (int i = r; i < MOD; ++i) {
            rotate_aux[j++] = v[i];
        }
        for (int i = 0; i < r; ++i) {
            rotate_aux[j++] = v[i];
        }
        for (int i = 0; i < MOD; ++i) {
            v[i] = rotate_aux[i];
        }
    }

    static void apply_shift(int node, boolean is_leaf) {
        if (shift[node] == 0) return;

        if (!is_leaf) {
            int ls = (node << 1) + 1;
            int rs = ls + 1;

            shift[ls] = (shift[ls] + shift[node]) % MOD;
            shift[rs] = (shift[rs] + shift[node]) % MOD;
        }
        rotate(tree[node], shift[node]);
        shift[node] = 0;
    }

    static int from, to, val;
    static int[] count = new int[MOD];

    static void get_count(int node, int lo, int hi) {
        apply_shift(node, lo == hi);
        if (from <= lo && hi <= to) {
            if (lo == from) {
                for (int i = 0; i < MOD; ++i) count[i] = tree[node][i];
            } else {
                for (int i = 0; i < MOD; ++i) count[i] += tree[node][i];
            }
        } else {
            int ls = (node << 1) + 1;
            int rs = ls + 1;
            int mid = (lo + hi) >> 1;

            if (mid >= from) get_count(ls, lo, mid);
            if (mid+1 <= to) get_count(rs, mid+1, hi);
        }
    }

    static void lazy_shift(int node, int lo, int hi) {
        apply_shift(node, lo == hi);

        if (hi < from) return;
        if (lo > to) return;

        if (from <= lo && hi <= to) {
            shift[node] = val;
            apply_shift(node, lo == hi);
        } else {
            int ls = (node << 1) + 1;
            int rs = ls + 1;
            int mid = (lo + hi) >> 1;

            lazy_shift(ls, lo, mid);
            lazy_shift(rs, mid+1, hi);

            for (int i = 0; i < MOD; ++i)
                tree[node][i] = tree[ls][i] + tree[rs][i];
        }
    }

    static StringTokenizer tokenizer = new StringTokenizer("");
    static BufferedReader reader = new BufferedReader(new InputStreamReader(System.in));
    static PrintWriter writer = new PrintWriter(System.out);

    static String nextToken() throws Exception {
        while (!tokenizer.hasMoreTokens()) tokenizer = new StringTokenizer(reader.readLine());
        return tokenizer.nextToken();
    }

    static int nextInt() throws Exception {
        return Integer.parseInt(nextToken());
    }

    public static void main(String[] args) throws Exception {
        int n = nextInt();
        int q = nextInt();

        build(0, 0, n-1);

        while (q-- > 0) {
            from = nextInt();
            to = nextInt();

            get_count(0, 0, n-1);

            val = 0;
            for (int i = 0; i < MOD; ++i) {
                if (count[i] >= count[val]) val = i;
            }

            lazy_shift(0, 0, n-1);
        }

        for (from = 0; from < n; ++from) {
            to = from;
            get_count(0, 0, n-1);
            val = 0;
            for (int i = 0; i < MOD; ++i) {
                if (count[i] >= count[val]) val = i;
            }
            writer.println(val);
        }

        writer.close();
    }
}