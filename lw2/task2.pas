PROGRAM SarahRevere(INPUT, OUTPUT);
USES GPC;
VAR
  Ch1, Ch2, Ch3, Ch4, Flag: CHAR;
  Source: TEXT;
  Str: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  Str := GetEnv('QUERY_STRING');
  REWRITE(Source);
  WRITE(Source, Str);
  RESET(Source);
  Ch1 := ' ';
  Ch2 := ' ';
  Ch3 := ' ';
  Ch4 := ' ';
  SetEnv('QUERY_STRING', 'Sarah didn''t say.');
  WHILE NOT EOLN(Source)
  DO
    BEGIN
      Ch1 := Ch2;
      Ch2 := Ch3;
      Ch3 := Ch4;
      READ(Source, Ch4);
      IF (Ch1 = 'l') AND (Ch2 = 'a') AND (Ch3 = 'n') AND (Ch4 = 'd')
      THEN
        SetEnv('QUERY_STRING', 'The British are coming by land.');
      IF (Ch2 = 's') AND (Ch3 = 'e') AND (Ch4 = 'a')
      THEN
        SetEnv('QUERY_STRING', 'The British are coming by sea.');
      IF (Ch2 = 'a') AND (Ch3 = 'i') AND (Ch4 = 'r')
      THEN
        SetEnv('QUERY_STRING', 'The British are coming by air.'); 
    END;  
  WRITELN(GetEnv('QUERY_STRING'));
END.
