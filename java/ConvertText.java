import java.io.File;
import java.nio.file.Files;
import java.nio.file.Path;

import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;

public class ConvertText {
  public static void main(String[] args) throws Exception {
    try {
      File pdfFile = new File("/var/www/convert-pdf-text-web-app/uploads/" + args[0]);
      PDDocument pdDocument = PDDocument.load(pdfFile);
      PDFTextStripper pdfStripper = new PDFTextStripper();
      String text = pdfStripper.getText(pdDocument);

      String fileId = args[0].split(".pdf")[0].toString();
      String textFilePath = "/var/www/convert-pdf-text-web-app/text/" + fileId + ".txt";
      File textFile = new File(textFilePath);
      if(textFile.createNewFile())
        Files.writeString(Path.of(textFilePath), text);

      pdDocument.close();
    } catch (Exception e) {
      e.printStackTrace();
    }
  }
}
