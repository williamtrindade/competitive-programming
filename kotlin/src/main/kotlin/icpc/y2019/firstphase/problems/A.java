package icpc.y2019.firstphase.problems;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.lang.Math;

class A {
    public static void main(String[] args) throws IOException {
        BufferedReader in = new BufferedReader(new InputStreamReader(System.in)); 
        String[] input = in.readLine().split(" ");

        int M = Integer.parseInt(input[0]); 
        int N = Integer.parseInt(input[1]); 
        int K = Integer.parseInt(input[2]); 
        
        ArrayList<Sensor> sensors = new ArrayList<Sensor>();

        for (int i = 0; i < K; i++) {
            String[] newInput = in.readLine().split(" ");

            int X = Integer.parseInt(newInput[0]); 
            int Y = Integer.parseInt(newInput[1]); 
            int S = Integer.parseInt(newInput[2]); 
            sensors.add(new Sensor(X, Y, S));
        }

        addGraphIntersections(
            sensors,
            new Position(0, 0),
            new Position(M, N)
        );

        String resp = null;
        for (Sensor sensor: sensors) {
            Sensor copy = new Sensor(sensor.X, sensor.Y, sensor.S, sensor.getIntersections());
            int xAxisLeft = delveIntoXAxisLeft(copy, copy.X);
            int xAxisRight = delveIntoXAxisRight(copy, copy.X);
            int yAxisUp = delveIntoYAxisUp(copy, copy.Y);
            int yAxisDown = delveIntoYAxisDown(copy, copy.Y);

            if (xAxisLeft <= 0 && yAxisUp <= 0) {
                resp = "N";
            }
            if (xAxisRight >= M && yAxisDown >= N) {
                resp = "N";
            }
            if ((xAxisLeft <= 0) && (xAxisRight >= M)) {
                resp = "N";
            } else if (( yAxisUp<= 0) && ( yAxisDown>= N)) {
                resp = "N";
            }          
        }
        resp = (resp != "N") ? "S" : "N";
        System.out.println(resp);
        in.close();

    }

    public static int delveIntoXAxisRight(Sensor sensor, int max) {
        for (int i = 0; i < sensor.intersections.size(); i++) {
            Sensor sensorDeep = sensor.intersections.get(i);
            sensorDeep.intersections.remove(sensor);
            max = delveIntoXAxisRight(sensorDeep, max);
            if ((sensorDeep.X + sensorDeep.S) > max) {
                max = sensorDeep.X + sensorDeep.S;
            }
        }
        return max;
    }

    public static int delveIntoXAxisLeft(Sensor sensor, int max) {
        for (int i = 0; i < sensor.intersections.size(); i++) {
            Sensor sensorDeep = sensor.intersections.get(i);
            sensorDeep.intersections.remove(sensor);
            max = delveIntoXAxisLeft(sensorDeep, max);
            if ((sensorDeep.X - sensorDeep.S) < max) {
                max = sensorDeep.X - sensorDeep.S;
            }
        }
        return max;
    }

    public static int delveIntoYAxisDown(Sensor sensor, int max) {
        for (int i = 0; i < sensor.intersections.size(); i++) {
            Sensor sensorDeep = sensor.intersections.get(i);
            sensorDeep.intersections.remove(sensor);
            max = delveIntoYAxisDown(sensorDeep, max);
            if ((sensorDeep.Y + sensorDeep.S) > max) {
                max = sensorDeep.Y + sensorDeep.S;
            }
        }
        return max;
    }

    public static int delveIntoYAxisUp(Sensor sensor, int max) {
        for (int i = 0; i < sensor.intersections.size(); i++) {
            Sensor sensorDeep = sensor.intersections.get(i);
            sensorDeep.intersections.remove(sensor);
            max = delveIntoYAxisUp(sensorDeep, max);
            if ((sensorDeep.Y - sensorDeep.S) < max) {
                max = sensorDeep.Y - sensorDeep.S;
            }
        }
        return max;
    }


    public static void addGraphIntersections(
        ArrayList<Sensor> sensors,
        Position doorPosition,
        Position artworkPosition
    ) {
        for (Sensor sensor: sensors) {
            for (Sensor otherSensor: sensors) {
                if (verifyAxisIntersections(sensor, otherSensor)) {
                    sensor.intersections.add(otherSensor);
                }
            }
        };
    }

    public static boolean verifyAxisIntersections(Sensor sensorA, Sensor sensorB) {
        double dist = Math.hypot(sensorA.X - sensorB.X, sensorA.Y - sensorB.Y);
        if (dist <= (sensorA.S + sensorB.S)) {
            return  true;
        }
        return false;
    }
}

class Position {
    public int X;   
    public int Y;

    Position(int x, int y) {
        this.X = x;
        this.Y = y;
    }
}


class Sensor {
    public int X;   
    public int Y;
    public int S;
    public ArrayList<Sensor> intersections = new ArrayList<Sensor>();

    Sensor(int x, int y, int s) {
        this.X = x;
        this.Y = y;
        this.S = s;
    }

    Sensor(int x, int y, int s, ArrayList<Sensor> intersections) {
        this.X = x;
        this.Y = y;
        this.S = s;
        this.intersections = intersections;
    }


    public Sensor(Sensor sensor) {
        this.X = sensor.X;
        this.Y = sensor.Y;
        this.S = sensor.S;
        this.intersections = (ArrayList) this.intersections.clone();
    }

    public String toString() {
        return " X: " + X + " Y: " + Y + " S: " + S;
    }

    public ArrayList<Sensor> getIntersections() {
        ArrayList<Sensor> intersectionsCopy = new ArrayList<Sensor>();
        for (int i = 0; i < this.intersections.size(); i++) {
            Sensor newSensor = new Sensor(this.intersections.get(i));
            intersectionsCopy.add(newSensor);
        }
        return intersectionsCopy;
    }
}