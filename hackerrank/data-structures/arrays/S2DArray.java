import java.io.*;
import java.util.*;

public class S2DArray {

    // Complete the hourglassSum function below.
    static int hourglassSum(int[][] arr) {
        int bigSum = 0;
        for (int i = 0; i < 6 ; i++) {
            if (i < 4) {
                for (int j = 0; j < 6; j ++) {
                    if (j < 4) {
                        int sum =
                            arr[j][i] + 
                            arr[j][i+1] +
                            arr[j][i+2] + 
                            arr[j+1][i+1] + 
                            arr[j+2][i] +
                            arr[j+2][i+1] +
                            arr[j+2][i+2];
                        if (i == 0 && j == 0) bigSum = sum;
                        if (sum > bigSum) bigSum = sum;
                    }
                }
            }
            
        }
        return bigSum;
    }

    private static final Scanner scanner = new Scanner(System.in);

    public static void main(String[] args) throws IOException {
        BufferedWriter bufferedWriter = new BufferedWriter(new FileWriter(System.getenv("OUTPUT_PATH")));

        int[][] arr = new int[6][6];

        for (int i = 0; i < 6; i++) {
            String[] arrRowItems = scanner.nextLine().split(" ");
            scanner.skip("(\r\n|[\n\r\u2028\u2029\u0085])?");

            for (int j = 0; j < 6; j++) {
                int arrItem = Integer.parseInt(arrRowItems[j]);
                arr[i][j] = arrItem;
            }
        }

        int result = hourglassSum(arr);

        bufferedWriter.write(String.valueOf(result));
        bufferedWriter.newLine();

        bufferedWriter.close();

        scanner.close();
    }
}
