PROGRAM HelloDear(INPUT, OUTPUT);
USES GPC;
VAR
  Ch1, Ch2, Ch3, Ch4, Flag: CHAR;
  Source: TEXT;
  StrSource, Answer: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  StrSource := GetEnv('QUERY_STRING');
  REWRITE(Source);
  WRITE(Source, StrSource);
  RESET(Source);
  Ch1 := ' ';
  Ch2 := ' ';
  Ch3 := ' ';
  Ch4 := ' ';
  Flag := 'F';
  Answer := 'Anonymous';
  WHILE NOT EOLN(Source) AND (Flag = 'F')
  DO
    BEGIN
      Ch1 := Ch2;
      Ch2 := Ch3;
      Ch3 := Ch4;
      READ(Source, Ch4);
      IF (Ch1 = 'n') AND (Ch2 = 'a') AND (Ch3 = 'm') AND (Ch4 = 'e')
      THEN
        BEGIN
          WHILE NOT EOLN(Source)
          DO
            BEGIN
              Ch1 := Ch2;
              Ch2 := Ch3;
              Ch3 := Ch4;
              READ(Source, Ch4);
              IF Ch4 = '='
              THEN
                BEGIN
                  WHILE NOT EOLN(Source)
                  DO
                    BEGIN
                      Ch1 := Ch2;
                      Ch2 := Ch3;
                      Ch3 := Ch4;
                      READ(Source, Ch4);
                      IF (Ch1 = '%') AND (Ch2 = '2') AND (Ch3 = '0')
                      AND (Ch4 <> '&') AND (Ch4 <> '%') AND (Flag = 'F')
                      THEN
                        BEGIN
                          Answer := Ch4;
                          WHILE (NOT EOLN(Source)) AND (Ch4 <> '&') AND (Ch4 <> '%')
                          DO
                            BEGIN
                              READ(Source, Ch4);
                              IF (Ch4 <> '&') AND (Ch4 <> '%')
                              THEN
                                Answer := Answer + Ch4
                            END;
                          Flag := 'T'
                        END
                    END
                END
            END
        END
    END;
  WRITELN('Hello ' + Answer + '!')
END.
