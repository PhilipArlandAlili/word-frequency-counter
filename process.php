<?php

$sentence = $_POST["text"];
$order = $_POST["sort"];
$limit = $_POST["limit"];

/**
 * This function counts the number of occurance of words from tokenized_words
 * and excludes the words that insides the $stop_words
 */
function countFrequency($tokenized_words, $stop_words) {
    $dictionary = [];
    foreach ($tokenized_words as $word) {
        //word is not in stop_words//       //word is not key in dictionary// 
        if(!in_array($word, $stop_words) && !array_key_exists($word, $dictionary)) {
            $dictionary[$word] = 1;
        } else if(!in_array($word, $stop_words)) {
            $dictionary[$word] += 1;
        }
    }
    return $dictionary;
}
/**
 * This function sorts a dictionary of key based on specified order.
 * The sorting can be either ascending or descending.
 */
function sortArray($dictionary, $order) {
    if ($order == "asc") {
        asort($dictionary);
    } elseif ($order == "desc"){
        arsort($dictionary);
    }
    return $dictionary;
}
/**
 * This function displays the result in an organized and
 * presentable table.
 */
function displayInOrganizedTable($final_array) {
    echo '<style>
            table {
                border-collapse: collapse;
                width: 50%;
                margin: 20px auto;
            }
            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #f2f2f2;
            }
          </style>';
    
    echo '<table>';
    echo '<thead><tr><th>Word</th><th>Frequency</th></tr></thead>';
    echo '<tbody>';

    foreach ($final_array as $word => $frequency) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($word) . '</td>';
        echo '<td>' . $frequency . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
}
/**
 * This function is the step by step process that we need
 * for this task
 */
function tokenizeSentence($sentence, $order, $limit) {
    $stop_words = [
        "the",
        "and",
        "in"
    ];

    $tokenized_words = preg_split('/[\s\p{P}]+/', $sentence, -1, PREG_SPLIT_NO_EMPTY);

    $dictionary = countFrequency($tokenized_words, $stop_words);
    
    $sort_array = sortArray($dictionary, $order);
    
    $final_array = array_slice($sort_array, 0, $limit);
    
    displayInOrganizedTable($final_array);
    
}

tokenizeSentence($sentence, $order, $limit);

?>