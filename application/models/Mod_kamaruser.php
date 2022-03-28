<?php
class Mod_kamaruser extends CI_Model
{
    var $tabel = 'kamar';
    public function getDataJson($id)
    {
        $datakamar = $this->db->select('kamar.*, kamargalery.url,tipekamar.tipekamar')
            ->from($this->tabel)
            ->join('kamargalery', 'kamar.idkamar=kamargalery.kamarid', 'left')
            ->join('tipekamar', 'kamar.tipekamarid=tipekamar.idtipekamar', 'let')
            ->where('kamar.idkamar', $id)
            ->get()->result();
        $datafasilitaskamar = $this->db->select('fasilitas.namafasilitas,fasilitas.icon, detailfasilitaskamar.kamarid, kamar.namakamar')
            ->from('fasilitas')
            ->join('detailfasilitaskamar', 'fasilitas.idfasilitas=detailfasilitaskamar.fasilitasid', 'left')
            ->join('kamar', 'kamar.idkamar=detailfasilitaskamar.kamarid', 'left')
            ->where('detailfasilitaskamar.kamarid', $id)
            ->get()->result();
        $datarating = $this->db->select('AVG(value) as rata2')
            ->from('tripadvisor')
            ->where('kamarid', $id)
            ->get()->result();
        $datadetailkomentar = $this->db->select('review.idreview,tamu.nama,review.review,review.created_at, kamar.idkamar,kamar.namakamar')
            ->from('review')
            ->join('tamu', 'review.tamuid=tamu.idtamu', 'left')
            ->join('kamar', 'review.kamarid=kamar.idkamar', 'left')
            ->where('kamar.idkamar', $id)
            ->get()->result();
        return
            [
                'datakamar'     => $datakamar,
                'datafasilitas' => $datafasilitaskamar,
                'datarating'    => $datarating,
                'datakomentar'  => $datadetailkomentar
            ];
    }
    public function getDataReservasi($iduser, $idkamar)
    {
        $datauser = $this->db->get_where('tamu', ['idtamu' => $iduser])->result();
        $datakamar = $this->db->get_where('kamar', ['idkamar' => $idkamar])->result();
        return
            [
                'datakamar' => $datakamar,
                'datauser'  => $datauser
            ];
    }
    public function getDataDetailReservasiku($iduser)
    {
        $this->db->select('reservasi.*,kamar.namakamar');
        $this->db->from('reservasi');
        $this->db->join('kamar', 'reservasi.kamarid=kamar.idkamar', 'left');
        $this->db->where('reservasi.tamuid', $iduser);
        return $this->db->get();
    }
}
