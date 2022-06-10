## Example Task

The researcher wants to analyze the data visually, for which he needs to see
detailing changes in values on the graph. Your task is to write a console script,
displaying each point of the graph in a separate line so that the changes are
visually noticeable. The solution should work for any dataset. To simplify
the width of the terminal window can be taken equal to 80 characters. Expected result for
The above data should look something like this:


## Usage

    $input = [
        1.1066, 1.1048, 1.1023, ... 
    ];

    $normalizedOutput = new NormalizedOutput(NUMBER_SCREEN_CHARS, CHAR_POINT);    
    $normalizedOutput->outNormalized($input);

    $normalizedOutput->setChar(CHAR_ASTERIX);
    $normalizedOutput->outNormalized($input);

