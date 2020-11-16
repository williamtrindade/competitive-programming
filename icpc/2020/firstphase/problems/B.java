import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.HashMap;
import java.util.Map;

public class B {
    private final static int GRID_SIZE = 10;
    private final static int VERTICAL = 1;
    private final static int HORIZONTAL = 0;

    public static void main(String[] args) throws IOException {
       BufferedReader bf = new BufferedReader(new InputStreamReader(System.in));

        String[] nReader = bf.readLine().split(" ");
        int N = Integer.parseInt(nReader[0]);
        String response = "Y";

        Map<Integer, Integer> hashMapMaskers = new HashMap<Integer, Integer>();

        for (int i = 0; i < N; i++) {
            String[] input = bf.readLine().split(" ");
            int D = Integer.parseInt(input[0]); // 1 = v or  0 = h
            int L = Integer.parseInt(input[1]); // 1 - 5
            int R = Integer.parseInt(input[2]); // 1 - 10
            int C = Integer.parseInt(input[3]); // 1 - 10
            Ship ship = new Ship(D, R, C, L);

            // Verify if is inside GRID
            if (ship.direction == HORIZONTAL) {
                int pos = (ship.y + ship.size) - 1;
                if (pos > GRID_SIZE) {
                    response = "N";
                    break;
                }

                boolean hasOverships = false;
                for (int z = ship.y; z <= pos; z++) {
                    try {
                        int yPos = hashMapMaskers.get(ship.x);
                        if (yPos == z) {
                            hasOverships = true;
                            break;
                        }
                    } catch (Exception ignored) {
                    }
                    hashMapMaskers.put(ship.x, z);
                }
                if (hasOverships) {
                    response = "N";
                    break;
                }
            } else if (ship.direction == VERTICAL) {
                int pos = (ship.x + ship.size) - 1;
                if (pos > GRID_SIZE) {
                    response = "N";
                    break;
                }

                boolean hasOverships = false;
                for (int z = ship.x; z <= pos; z++) {
                    try {
                        int yPos = hashMapMaskers.get(z);
                        if (yPos == ship.y) {
                            hasOverships = true;
                            break;
                        }
                    } catch (Exception ignored) {
                    }
                    hashMapMaskers.put(ship.y, z);
                }
                if (hasOverships) {
                    response = "N";
                    break;
                }
            }

        }
        System.out.println(response);
        bf.close();
    }
}

class Ship {
    public int direction;
    public int x;
    public int y;
    public int size;

    public Ship(int direction, int x, int y, int size) {
        this.direction = direction;
        this.x = x;
        this.y = y;
        this.size = size;
    }
}