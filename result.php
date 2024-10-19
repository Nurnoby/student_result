<?php
// Function to calculate student result
function calculateResult($marks) {
    $totalMarks = 0;
    $subjectCount = count($marks);
    $isFailed = false;

    // Validate mark range and check fail condition
    foreach ($marks as $subject => $mark) {
        if ($mark < 0 || $mark > 100) {
            echo "Mark range is invalid for $subject. Marks should be between 0 and 100.\n";
            return;
        }
        if ($mark < 33) {
            echo "The student has failed in $subject with $mark marks.\n";
            $isFailed = true; // Set failure flag
        }
        $totalMarks += $mark;
    }

    // If the student failed in any subject, return failure message
    if ($isFailed) {
        echo "The student has failed.\n";
        return;
    }

    // Calculate total and average marks
    $averageMarks = $totalMarks / $subjectCount;

    // Determine grade based on average marks
    switch (true) {
        case ($averageMarks >= 80 && $averageMarks <= 100):
            $grade = "A+";
            break;
        case ($averageMarks >= 70 && $averageMarks < 80):
            $grade = "A";
            break;
        case ($averageMarks >= 60 && $averageMarks < 70):
            $grade = "A-";
            break;
        case ($averageMarks >= 50 && $averageMarks < 60):
            $grade = "B";
            break;
        case ($averageMarks >= 40 && $averageMarks < 50):
            $grade = "C";
            break;
        case ($averageMarks >= 33 && $averageMarks < 40):
            $grade = "D";
            break;
        default:
            $grade = "F";
            break;
    }

    // Output the result
    echo "Total Marks: " . $totalMarks . "\n";
    echo "Average Marks: " . number_format($averageMarks, 1) . "\n"; // Format to 1 decimal place
    echo "Grade: " . $grade . "\n";
}

// Example usage with a valid case:
$studentMarks = [
    "Math" => 50,
    "English" => 42,
    "Science" => 38,
    "History" => 60,
    "Geography" => 42
];

calculateResult($studentMarks);
?>
