import serial

btPort = "/dev/rfcomm0"
message = "1"

bluetoothSerial = serial.Serial( btPort, baudrate = 9600 )
bluetoothSerial.write( message )