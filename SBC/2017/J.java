import java.io.IOException;

/**
 * J: "Jogo de boca / SBC / 2017"
 */
class Program {
    public static void main(String[] args) throws IOException {
        System.out.println("Jogo de boca");
        System.out.println(solution((long) System.in.read()));
    }

    public static Long solution(Long i) {
        return (i % 3); 
    }
}