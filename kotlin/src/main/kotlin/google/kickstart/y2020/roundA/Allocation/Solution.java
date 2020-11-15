package google.kickstart.y2020.roundA.Allocation;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;

class Solution {
    public static void main(String[] args) throws IOException {
        BufferedReader bf = new BufferedReader(new InputStreamReader(System.in));
        int T = Integer.parseInt(bf.readLine().trim().split(" ")[0]);
        ArrayList<TestCase> testCases = new ArrayList<>();

        for(int i = 0; i < T; i++) {

            String[] input = bf.readLine().trim().split(" ");
            int N = Integer.parseInt(input[0]);
            int B = Integer.parseInt(input[1]);

            String[] inputPrizes = bf.readLine().trim().split(" ");
            int[] prizes = new int[N];

            for(int j = 0; j < N; j++) {
                prizes[j] = Integer.parseInt(inputPrizes[j]);
            }

            testCases.add(new TestCase(N, B, prizes));
        }

        for (int cases = 0; cases < testCases.size(); cases++) {
            TestCase testCase = testCases.get(cases);

            java.util.Arrays.sort(testCase.houses);
            int count = 0;

            for (int i = 0; i < testCase.houses.length; i++) {
                testCase.B = testCase.B - testCase.houses[i];
                if (testCase.B < 0) {
                    break;
                } else if (testCase.B >= 0) {
                    count ++;
                }
            }
            int caseCount = cases + 1;
            System.out.println("Case #" + caseCount + ": " + count);
        }
    }
}

class TestCase {
    public int N;
    public int B;
    public int[] houses;

    TestCase(int N, int B, int[] houses) {
        this.N = N;
        this.B = B;
        this.houses = houses;
    }
}