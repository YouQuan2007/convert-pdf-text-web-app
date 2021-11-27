import java.io.*;
import org.apache.pdfbox.pdmodel.*;
import org.apache.pdfbox.text.PDFTextStripper;



public class PdfExtractor{
  public static void main(String[] args){
    try{
      File pdfFile = new File ();
      System.out.println("Hello World");

      PDDocument pdDocument = PDDocument.load(pdfFile);
      PDFTextStripper pdfStripper = new PDFTextStripper();
      String text= pdfStripper.getText(pdDocument);
      System.out.println(text);
    }
    catch(Exception e){
      e.printStackTrace();
    }
  }
}