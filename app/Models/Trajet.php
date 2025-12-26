<?php

class Trajet
{
    /**
     * Récupère tous les trajets disponibles avec toutes les infos
     */
    public static function getDisponibles()
    {
        $pdo = getPDO();
        $sql = "SELECT 
                    t.*,
                    t.places as places_total,
                    e.nom as nom,
                    e.prenom as prenom,
                    e.telephone as telephone,
                    e.email as email,
                    a.ville as agence_ville
                    
                FROM trajets t
                LEFT JOIN employes e ON t.employe_id = e.id
                LEFT JOIN agences a ON t.agence_id = a.id
                WHERE t.date_trajet >= CURDATE()
                ORDER BY t.date_trajet ASC";
        
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Trouve un trajet par son ID
     */
    public static function find($id)
    {
        $pdo = getPDO();
        $stmt = $pdo->prepare("SELECT * FROM trajets WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Crée un nouveau trajet
     */
    public static function create($data)
    {
        $pdo = getPDO();
        $sql = "INSERT INTO trajets 
                (ville_depart, ville_arrivee, date_trajet, places, prix, agence_id, employe_id) 
                VALUES (:ville_depart, :ville_arrivee, :date_trajet, :places, :prix, :agence_id, :employe_id)";
        
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * Met à jour un trajet existant
     */
    public static function update($id, $data)
    {
        $pdo = getPDO();
        $sql = "UPDATE trajets 
                SET ville_depart = :ville_depart,
                    ville_arrivee = :ville_arrivee,
                    date_trajet = :date_trajet,
                    places = :places,
                    prix = :prix
                WHERE id = :id";
        
        $data['id'] = $id;
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * Supprime un trajet
     */
    public static function delete($id)
    {
        $pdo = getPDO();
        $stmt = $pdo->prepare("DELETE FROM trajets WHERE id = ?");
        return $stmt->execute([$id]);
    }
}