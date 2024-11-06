'use strict';
module.exports = function(app) {
    let sinhvienControllers = require('./controllers/sinhvienController');

    app.route('/sinhvien')
        .get(sinhvienControllers.GetAllSinhvien);
    app.route('/sinhvien/EditIF/:Masv')
        .get(sinhvienControllers.EditSinhvienIF);
    app.route('/sinhvien/Insert')
        .post(sinhvienControllers.InsertSinhvien);
    app.route('/sinhvien/Edit/:Masv')
        .put(sinhvienControllers.EditSinhvien);
    app.route('/sinhvien/Delete/:Masv')
        .delete(sinhvienControllers.DeleteSinhvien);
    app.route('/sinhvien/Search')
        .post(sinhvienControllers.getSinhvienByinfo);
    app.route('/sinhvien/Check')
        .get(sinhvienControllers.CheckTrungSinhvien);
    
    let phongControllers = require('./controllers/phongController');
    app.route('/phong')
        .get(phongControllers.GetAllphong);
    app.route('/phong/EditIF/:Maphong')
        .get(phongControllers.EditPhongIF);
    app.route('/phong/Insert')
        .post(phongControllers.InsertPhong);
    app.route('/phong/Edit/:Maphong')
        .put(phongControllers.EditPhong);
    app.route('/phong/Delete/:Maphong')
        .delete(phongControllers.DeletePhong);
    app.route('/phong/Search')
        .post(phongControllers.getPhongByinfo);
    app.route('/phong/Check')
        .get(phongControllers.CheckTrungPhong);

    let nhanvienControllers = require('./controllers/nhanvienController');
    app.route('/nhanvien')
        .get(nhanvienControllers.GetAllNhanvien);
    app.route('/nhanvien/EditIF/:Manv')
        .get(nhanvienControllers.EditNhanvienIF);
    app.route('/nhanvien/Insert')
        .post(nhanvienControllers.InsertNhanvien);
    app.route('/nhanvien/Edit/:Manv')
        .put(nhanvienControllers.EditNhanvien);
    app.route('/nhanvien/Delete/:Manv')
        .delete(nhanvienControllers.DeleteNhanvien);
    app.route('/nhanvien/Search')
        .post(nhanvienControllers.getNhanvienByinfo);
    app.route('/nhanvien/Check')
        .get(nhanvienControllers.CheckTrungNhanvien);
};  


    
//npm start