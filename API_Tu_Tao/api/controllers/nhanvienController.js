'use strict'

const util = require('util')
const mysql = require('mysql')
const db = require('../db')

exports.EditNhanvien = function (req, res) {
    let sql = 'UPDATE quanly SET Hoten=?, Ngaysinh=?, Gioitinh=?, Sdt=?, Quequan=?, Chucvu=? WHERE Manv=?';
    db.query(sql, [req.body.Hoten, req.body.Ngaysinh, req.body.Gioitinh, req.body.Sdt, req.body.Quequan,req.body.Chucvu,req.params.Manv], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Thêm nhân viên
exports.InsertNhanvien = function (req, res) {
    let sql ='INSERT INTO quanly (Manv, Hoten, Ngaysinh, Gioitinh,Sdt,Quequan,Chucvu) VALUES (?, ?, ?,?,?,?,?)';
    db.query(sql, [req.body.Manv,req.body.Hoten, req.body.Ngaysinh, req.body.Gioitinh, req.body.Sdt, req.body.Quequan,req.body.Chucvu], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Sửa nhân viên IF
exports.EditNhanvienIF = function (req, res) {
    let sql = 'SELECT * FROM quanly WHERE Manv = ?';
    db.query(sql, [req.params.Manv], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.length === 0) {
            return res.status(404).json({ message: 'Nhân viên không tồn tại' });
        }
        res.json(response);
    });
};

// Lấy toàn bộ nhân viên
exports.GetAllNhanvien = function (req, res) {
    let sql = 'SELECT * FROM quanly';
    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Xóa nhân viên
exports.DeleteNhanvien = function (req, res) {
    let sql = 'DELETE FROM quanly WHERE Manv = ?';
    db.query(sql, [req.params.Manv], (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        if (response.affectedRows === 0) {
            return res.status(404).json({ message: 'Nhân viên không tồn tại' });
        }
        res.json(response);
    });
};

// Tìm kiếm nhân viên
exports.getNhanvienByinfo = function (req, res) {
    let Manv = req.body.Manv;
    let Hoten = req.body.Hoten;
    let Chucvu = req.body.Chucvu;

    let sql = 'SELECT * FROM quanly WHERE  Manv LIKE "%' + Manv + '%" OR Hoten LIKE "%' + Hoten + '%" OR Chucvu LIKE "%' + Chucvu + '%"';


    db.query(sql, (err, response) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }
        res.json(response);
    });
};

// Kiểm tra trùng mã nhân viên
exports.CheckTrungNhanvien = function (req, res) {
    const Manv = req.query.Manv;

    const sql = 'SELECT Manv FROM quanly WHERE Manv = ?';
    db.query(sql, [Manv], (err, rows) => {
        if (err) {
            console.error(err);
            return res.status(500).json({ message: 'Internal Server Error' });
        }

        if (rows.length > 0) {
            res.json({ message: 'Mã nhân viên đã tồn tại' });
        } else {
            res.json({ message: 'Mã nhân viên không tồn tại' });
        }
    });
}