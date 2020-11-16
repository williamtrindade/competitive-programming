import java.util.*;

public class Solution {
    public static void main(String[] args) {
        Program program = new Program("43 4f 44 45 52 41 43 45 00 4c 14 07 14 0a 09 1b 03 1f 4b ec 05 b3 7a d8 03 2b d1 ae 05 c2 2a 74 00 0e d4 a9 12 01 68 E9 67 07 2e 08 05 0b 46 65 72 72 6f 20 56 65 6c 68 6f 0e 54 69 6d 65 20 43 61 63 68 6f 65 69 72 61 32 30 32 30");
        program.process();
        System.out.println(program.response);
    }
}

class Program {
    private String inputString;
    private String outputString;
    public HashMap<String, String> response = new HashMap<>();

    public Program(String inputString) {
        this.inputString = inputString;
    }

    public String getInputString() {
        return inputString;
    }

    public void setInputString(String inputString) {
        this.inputString = inputString;
    }

    public String getOutputString() {
        return outputString;
    }

    public void setOutputString(String outputString) {
        this.outputString = outputString;
    }

    void process() {
        ArrayList<String> list = new ArrayList<>(Arrays.asList(this.inputString.split(" ")));
        Decodificator decodificator = new Decodificator(list);

        for (Data structureItem: decodificator.getResultStructure()) {
            String type = structureItem.getType();
            switch (type) {
                case "int":
                    this.response.put(structureItem.getName(), decodificator.decodeInt(decodificator.getChunkedArray(0, structureItem.getSize())));
                    break;
                case "string":
                    this.response.put(structureItem.getName(), decodificator.decodeString(decodificator.getChunkedArray(0, structureItem.getSize())));
                    break;
            }
            decodificator.hexArray.subList(0, structureItem.getSize()).clear();
            System.out.println(decodificator.hexArray);
        }
    }
}

class Decodificator {
    private ArrayList<Data> resultStructure = new ArrayList<>();
    public ArrayList<String> hexArray;

    public Decodificator(ArrayList<String> hexArray) {
        this.hexArray = hexArray;
        this.fillStructure();
    }

    private void fillStructure() {
        this.resultStructure.add(new Data(8, "string", "bytes_iniciais"));
        this.resultStructure.add(new Data(2, "int", "tamanho"));
        this.resultStructure.add(new Data(6, "date", "datahora"));
        this.resultStructure.add(new Data(4, "lat", "lat_atual"));
        this.resultStructure.add(new Data(4, "lng", "lng_atual"));
        this.resultStructure.add(new Data(4, "lng", "lat_anterior"));
        this.resultStructure.add(new Data(4, "lng", "lng_anterior"));
        this.resultStructure.add(new Data(4, "int", "id_jogador"));
        this.resultStructure.add(new Data(1, "int", "id_equipe"));
        this.resultStructure.add(new Data(2, "int", "velocidade"));
        this.resultStructure.add(new Data(2, "direcao_status", "direcao_status"));
        this.resultStructure.add(new Data(1, "int", "saude"));
        this.resultStructure.add(new Data(1, "int", "skin_veiculo"));
        this.resultStructure.add(new Data(1, "int", "tipo_veiculo"));
        this.resultStructure.add(new Data(1, "localizacao", "localizacao"));
        this.resultStructure.add(new Data(1, "int", "tamanho_regiao"));
        this.resultStructure.add(new Data(0, "int", "regiao"));
        this.resultStructure.add(new Data(1, "int", "tamanho_equipe"));
        this.resultStructure.add(new Data(0, "int", "equipe"));
        this.resultStructure.add(new Data(4, "int", "bytes_finais"));
    }

    String decodeInt(List<String> data) {
        StringBuilder result = new StringBuilder();
        for(String item: data) {
            result.append((int)Integer.valueOf(item, 16));
        }
        return result.toString();
    }

    String decodeString(List<String> chunkedArray) {
        StringBuilder result = new StringBuilder();
        for(String item: chunkedArray) {
            int n = Integer.valueOf(item, 16);
            result.append((char)n);
        }
        return result.toString();
    }

    public ArrayList<Data> getResultStructure() {
        return resultStructure;
    }

    public void setHexArray(ArrayList<String> hexArray) {
        this.hexArray = hexArray;
    }

    public ArrayList<String> getHexArray() {
        return this.hexArray;
    }

    List<String> getChunkedArray(int from, int to) {
        return this.hexArray.subList(from, to);
    }
}

class Data {
    public Data(int size, String type, String name) {
        this.size = size;
        this.type = type;
        this.name = name;
    }

    private String name;
    private String type;

    public int getSize() {
        return size;
    }

    public void setSize(int size) {
        this.size = size;
    }

    private int size;

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public Data(String type) {
        this.type = type;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }
}