import java.io.*;
import org.apache.pdfbox.pdmodel.*;
import org.apache.pdfbox.text.PDFTextStripper;

public class convert_text{
  public static void main(String[] args)
  {
    try{
    File pdfFile = new File("sample.pdf");
    PDDocument pdDocument = PDDocument.lod(pdfFile);
    PDFTextStripper pdfStripper = new PDFTextStripper();
    String text= pdfStripper.getText(pdDocument);
    System.out.println(text);
    }
    catch(Exeption e){
      e.printStackTrace();
    }
  }
  // public static void main(String[] args){
  //   System.out.println("Hello World"  + args[0]);
  // }
}