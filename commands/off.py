import serial

btPort = "/dev/rfcomm0"
message = "0"

bluetoothSerial = serial.Serial( btPort, baudrate = 9600 )
bluetoothSerial.write( message )