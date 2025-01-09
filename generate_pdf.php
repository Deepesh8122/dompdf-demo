<?php
require 'vendor/autoload.php'; // Include Dompdf autoloader

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

// Load the HTML from the external file
$html = file_get_contents('content.html'); // Load content from the external HTML file

// Load the CSS files (app.css and pdf.css)
// $app_css = file_get_contents('app.css');  // Your general styles
// $pdf_css = file_get_contents('pdf.css');  // Styles specific to PDF

// // Add both CSS files to the HTML content inside <style> tags
// $html = "<style>" . $app_css . "</style>" . "<style>" . $pdf_css . "</style>" . $html;


try {
    // Load and render the HTML to generate the PDF
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    // Output the PDF to a file (without forcing download)
    $output = $dompdf->output();
    file_put_contents('generated_pdf.pdf', $output);

    // Display the three sections on the same page
    echo '<div class="app-container" style="">';

    // Section 1: Display PDF
    echo '<div class="pdf-renter-box" style="border: 2px solid #ddd; padding: 0; background: #f9f9f9;">';
    echo '<h3>Generated PDF</h3>';
    // echo '<p>The PDF is displayed below. If it does not show, check your browser settings.</p>';
    echo '<iframe src="generated_pdf.pdf" width="100%" height="600px" style="border: none;"></iframe>';
    echo '</div>';

    // Section 2: Display the source HTML
    echo '<div class="pdf-preview-box" style="border: 2px solid #ddd; padding: 20px; background: #f9f9f9;">';
    echo '<h3>HTML Preview:</h3>';
    echo '<div style="background-color: #f4f4f4; padding: 0; border-radius: 5px; border: 1px solid #ddd;">';
    echo $html; // Directly render the HTML code as it would appear in a browser
    echo '</div>';
    echo '</div>';

    // Section 3: Preview of the source HTML (rendered as a browser preview)
    echo '<div class="pdf-source-box" style="border: 2px solid #ddd; padding: 20px; background: #f9f9f9;">';
    echo '<h3>Source HTML:</h3>';
    echo '<pre style="background-color: #f4f4f4; padding: 15px; border-radius: 5px;">';
    echo htmlspecialchars($html); // Escape HTML for safe output
    echo '</pre>';
    echo '</div>';

    echo '</div>'; // End of flex container

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
