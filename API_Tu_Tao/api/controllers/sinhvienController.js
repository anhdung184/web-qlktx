'use strict'

const util = require('util')
const mysql = require('mysql')
const db = require('../db')

exports.EditSinhvien = function (req, res) {
    let sql = 'UPDATE sinhvien SET Hoten=?, Ngaysinh=?, Gioitinh=?, Lop=?, Sdt=?, Quequan=? WHERE Masv=?';
    db.query(sql, [req.body.Hoten, req.body.Ngaysinh, req.body.Gioitinh,req.body.Lop, req.body.Sdt, req.body.Quequan,req.params.Masv], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Thêm sinh viên
exports.InsertSinhvien = function (req, res) {
    let sql ='INSERT INTO sinhvien (Masv, Hoten, Ngaysinh, Gioitinh,Lop,Sdt,Quequan) VALUES (?, ?, ?,?,?,?,?)';
    db.query(sql, [req.body.Masv,req.body.Hoten, req.body.Ngaysinh, req.body.Gioitinh,req.body.Lop, req.body.Sdt, req.body.Quequan], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Sửa sinh viên IF
exports.EditSinhvienIF = function (req, res) {
    let sql = 'SELECT * FROM sinhvien WHERE Masv = ?';
    db.query(sql, [req.params.Masv], (err, response) => {
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
exports.GetAllSinhvien = function (req, res) {
    let sql = 'SELECT * FROM sinhvien';
    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Xóa lớp
exports.DeleteSinhvien = function (req, res) {
    let sql = 'DELETE FROM sinhvien WHERE Masv = ?';
    db.query(sql, [req.params.Masv], (err, response) => {
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
exports.getSinhvienByinfo = function (req, res) {
    let Masv = req.body.Masv;
    let Hoten = req.body.Hoten;
    let Quequan = req.body.Quequan;

    let sql = 'SELECT * FROM sinhvien WHERE  Masv LIKE "%' + Masv + '%" OR Hoten LIKE "%' + Hoten + '%" OR Quequan LIKE "%' + Quequan + '%"';


    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Kiểm tra trùng mã sinh viên
exports.CheckTrungSinhvien = function (req, res) {
    const Masv = req.query.Masv;

    const sql = 'SELECT Masv FROM sinhvien WHERE Masv = ?';
    db.query(sql, [Masv], (err, rows) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }

        if (rows.length > 0) {
            res.json({ message: 'Mã sinh viên đã tồn tại' });
        } else {
            res.json({ message: 'Mã sinh viên không tồn tại' });
        }
    });
}