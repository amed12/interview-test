<?php
// required headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');


// instantiate sudoku object
include_once 'object/sudoku.php';

$sudoku = new Sudoku();

// get posted data
$data = json_decode(file_get_contents("php://input"));

// make sure data is not empty
if (
!empty($data->arraysudoku)
) {
    $sudoku->arraysudoku = $data->arraysudoku;
    $solvingsudoku = $sudoku->sudokuSolver($data->arraysudoku);
    if (!$solvingsudoku) {
        // set response code - 500
        http_response_code(500);
        // tell the user
        echo json_encode(array("message" => "Failed to solve sudoku check your input array!"));
    } else {
        // set response code - 200 solved
        http_response_code(200);

        // tell the user
        echo json_encode(array("message" => "Success" . $sudoku->displayGrid($data->arraysudoku)));
    }

} // tell the user data is incomplete
else {

    // set response code - 400 bad request
    http_response_code(400);

    // tell the user
    echo json_encode(array("message" => "Data is incomplete or wrong format."));
}
