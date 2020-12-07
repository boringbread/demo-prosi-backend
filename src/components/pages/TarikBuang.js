// import React, {useCallback, useState} from 'react'
// import axios from 'axios'

// const DragAndDrop = (props) => {

//   const [nama, setNama] = useState({
//     nama: ''
//   });

//   const [jenis, setJenis] = useState({
//     jenis: ''
//   });

//   const [file, setFile] = useState({
//     file: []
//   })

//   const[deskripsi, setDeskripsi] = useState({
//     deskripsi:''  
//   })

//   const handleChangeNama = (event) => {
//     const x = event.target.value;
//     setNama({nama: x})
//   }

//   const handleChangeJenis = (event) => {
//     const x = event.target.value;
//     setJenis({jenis: x})
//   }


//   const handleChangeFile = (event) => {
//     const x = event.target.files;
//     setFile({File: x})
//   }

//   const handleChangeDeskripsi = (event) => {
//     const x = event.target.value;
//     setDeskripsi({deskripsi: x})
//   }

//   const handleSubmit = (event) => {
//     event.preventDefault();

//     // var formData = new formData();
//     // formData.append('name', nama.nama);
//     // formData.append('File', file.file);
//     // formData.append('jenis', jenis.jenis);
//     // formData.append('deskripsi', deskripsi.deskripsi);

//     // axios.post('demo-prosi-backend/index.php/C_Tabel6/unggahBukti', formData).then((data) => 
//     //   console.log(data))
//     // ;

//     axios.post('demo-prosi-backend/index.php/C_Tabel6/unggahBukti', {
//       nama: nama.nama,
//       jenis: jenis.jenis,
//       file: file.file,
//       deskripsi: deskripsi.deskripsi,
//       idPenelitian: props.data.idPenelitian
//     })
//     // .then((data) => 
//     //   console.log(data));
    
//   };

//   // console.log(nama);
//   // console.log(jenis);
//   // console.log(file);
//   return (
//     <div>
//       {/* <IndexJs /> */}
//       <div className="auth-wrapper">
//         <div className="auth-inner">
//           <form onSubmit={handleSubmit}>
//             <h3>Unggah Bukti - {props.data.idPenelitian}</h3>

//             <div className="form-group">
//               <label>Nama Bukti</label>
//               <input
//                 type="text"
//                 className="form-control"
//                 placeholder="Masukkan Nama Bukti"
//                 name="Nama"
//                 value={nama.Nama}
//                 onChange={handleChangeNama}
//               />
//             </div>

//             <div className="form-group">
//               <label>Jenis Bukti</label>
//               <select className="form-control" name="jenis" value={jenis.jenis} onChange={handleChangeJenis}>
//                 <option value="Sertifikat">Sertifikat</option>
//                 <option value="Foto">Foto</option>
//                 <option value="Poster">Poster</option>
//                 <option value="Audi">Publikasi</option>
//               </select>
//             </div>

//             <div className="form-group">
//               <label>Upload File </label>
//               <input type="file" name="File" className="form-control" multiple value={file.file} onChange={handleChangeFile}/>
//             </div>

//             <div className="form-group">
//               <label>Deskripsi File</label>
//               <input
//                 type="text"
//                 className="form-control"
//                 placeholder="Masukkan Deskripsi File"
//                 name="Deskripsi"
//                 value={deskripsi.deskripsi}
//                 onChange={handleChangeDeskripsi}
//               />
//             </div>
//             <ol className="dropped-files">
//               {data.fileList.map((f) => {
//                 return <li key={f.name}>{f.name} <button style={{float:"right"}}>&times;</button>
//                 </li>;
//               })}
//             </ol>
//             <button type="submit" className="btn btn-primary btn-block">
//               Submit
//             </button>
//           </form>
//         </div>
//       </div>
//     </div>
//   );
// };

// export default DragAndDrop;
