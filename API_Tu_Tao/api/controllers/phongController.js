'use strict'

const util = require('util')
const mysql = require('mysql')
const db = require('../db')

exports.EditPhong = function (req, res) {
    let sql = 'UPDATE phong SET Loaiphong=?, Giaphong=?, Tinhtrang=?, Songuoio=?, Soluongtd=?, Mota=? WHERE Maphong=?';
    db.query(sql, [req.body.Loaiphong, req.body.Giaphong, req.body.Tinhtrang,req.body.Songuoio, req.body.Soluongtd, req.body.Mota,req.params.Maphong], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Thêm sinh viên
exports.InsertPhong = function (req, res) {
    let sql ='INSERT INTO phong (Maphong, Loaiphong, Giaphong, Tinhtrang,Songuoio,Soluongtd,Mota) VALUES (?, ?, ?,?,?,?,?)';
    db.query(sql, [req.body.Maphong,req.body.Loaiphong, req.body.Giaphong, req.body.Tinhtrang,req.body.Songuoio, req.body.Soluongtd, req.body.Mota], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Sửa sinh viên IF
exports.EditPhongIF = function (req, res) {
    let sql = 'SELECT * FROM phong WHERE Maphong = ?';
    db.query(sql, [req.params.Maphong], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.length === 0) {
            return res.status(404).json({ message: 'Lớp học không tồn tại' });
        }
        res.json(response);
    });
};

// Lấy toàn bộ sinh viên
exports.GetAllphong = function (req, res) {
    let sql = 'SELECT * FROM phong';
    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Xóa lớp
exports.DeletePhong = function (req, res) {
    let sql = 'DELETE FROM phong WHERE Maphong = ?';
    db.query(sql, [req.params.Maphong], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'Lớp học không tồn tại' });
        }
        res.json(response);
    });
};

// Tìm kiếm lớp
exports.getPhongByinfo = function (req, res) {
    let Maphong = req.body.Maphong;
    let Loaiphong = req.body.Loaiphong;

    let sql = 'SELECT * FROM phong WHERE  Maphong LIKE "%' + Maphong + '%" OR Loaiphong LIKE "%' + Loaiphong + '%"';


    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Kiểm tra trùng mã
exports.CheckTrungPhong = function (req, res) {
    const Maphong = req.query.Maphong;

    const sql = 'SELECT Maphong FROM phong WHERE Maphong = ?';
    db.query(sql, [Maphong], (err, rows) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }

        if (rows.length > 0) {
            res.json({ message: 'Mã đã tồn tại' });
        } else {
            res.json({ message: 'Mã không tồn tại' });
        }
    });
}