package com.tugasapps.sembarang;

/**
 * Created by AnggiRF on 3/24/2017.
 */



public class biodata extends Koneksi {

    String URL = "http://android-crud.pe.hu/mahasiswa.php";
    String url = "";
    String response = "";

    public String tampilBiodata() {
        try {
            url = URL + "?konek=view";
            System.out.println("URL Tampil Biodata: " + url);
            response = call(url);
        } catch (Exception e) {
        }
        return response;
    }

    public String inserBiodata(String nama, String alamat) {
        nama=nama.replace(" ","%20");
        alamat=alamat.replace(" ","%20");

        try {
            url = URL + "?konek=insert&nama=" + nama + "&alamat=" + alamat;
            System.out.println("URL Insert Biodata : " + url);
            response = call(url);
        } catch (Exception e) {
        }
        return response;
    }

    public String getBiodataById(int id) {
        try {
            url = URL + "?konek=get_biodata_by_id&id=" + id;
            System.out.println("URL Insert Biodata : " + url);
            response = call(url);
        } catch (Exception e) {
        }
        return response;
    }

    public String updateBiodata(String id, String nama, String alamat) {
        nama=nama.replace(" ","%20");
        alamat=alamat.replace(" ","%20");
        try {
            url = URL + "?konek=update&id=" + id + "&nama=" + nama + "&alamat=" + alamat;
            System.out.println("URL Insert Biodata : " + url);
            response = call(url);
        } catch (Exception e) {
        }
        return response;
    }

    public String deleteBiodata(int id) {
        try {
            url = URL + "?konek=delete&id=" + id;
            System.out.println("URL Insert Biodata : " + url);
            response = call(url);
        } catch (Exception e) {
        }
        return response;
    }
}




