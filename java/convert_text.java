import java.io.File;
import java.io.FileInputStream;
import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;
import org.junit.Test;


@SuppressWarnings("unused")
public class convert_text {
  @Test
  public void ReadPDFFile() throws Exception {
      File file= new File("/var/www/cat-assign/uploads");
      FileInputStream fis= new FileInputStream(file);

      PDDocument pdfDocument= PDDocument.load(fis);
      System.out.println(pdfDocument.getPages().getCount());
      PDFTextStripper pdfTextStripper = new PDFTextStripper();
      String docText = pdfTextStripper.getText(pdfDocument);
      System.out.println(docText);

      pdfDocument.close();
      fis.close();
  }
}