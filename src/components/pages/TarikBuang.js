import React from "react";
// import IndexJs from "./main.component.js";

const DragAndDrop = (props) => {
  const { data, dispatch } = props;

  const handleDragEnter = (e) => {
    e.preventDefault();
    e.stopPropagation();

    dispatch({ type: "SET_DROP_DEPTH", dropDepth: data.dropDepth + 1 });
  };

  const handleDragLeave = (e) => {
    e.preventDefault();
    e.stopPropagation();

    dispatch({ type: "SET_DROP_DEPTH", dropDepth: data.dropDepth - 1 });
    if (data.dropDepth > 0) return;
    dispatch({ type: "SET_IN_DROP_ZONE", inDropZone: false });
  };

  const handleDragOver = (e) => {
    e.preventDefault();
    e.stopPropagation();

    e.dataTransfer.dropEffect = "copy";
    dispatch({ type: "SET_IN_DROP_ZONE", inDropZone: true });
  };

  const handleDrop = (e) => {
    e.preventDefault();
    e.stopPropagation();

    let files = [...e.dataTransfer.files];

    if (files && files.length > 0) {
      const existingFiles = data.fileList.map((f) => f.name);
      files = files.filter((f) => !existingFiles.includes(f.name));

      dispatch({ type: "ADD_FILE_TO_LIST", files });
      dispatch({ type: "SET_DROP_DEPTH", dropDepth: 0 });
      dispatch({ type: "SET_IN_DROP_ZONE", inDropZone: false });
    }
  };
  return (
    <div>
      {/* <IndexJs /> */}
      <div className="auth-wrapper">
        <div className="auth-inner">
          <form>
            <h3>Unggah Bukti</h3>

            <div className="form-group">
              <label>Nama Bukti</label>
              <input
                type="text"
                className="form-control"
                placeholder="Masukkan Nama Bukti"
              />
            </div>

            <div className="form-group">
              <label>Jenis Bukti</label>
              <select className="form-control">
                <option value="Sertifikat">Sertifikat</option>
                <option value="Foto">Foto</option>
                <option value="Poster">Poster</option>
                <option value="Audi">Publikasi</option>
              </select>
            </div>
            <div
              className={
                data.inDropZone
                  ? "drag-drop-zone inside-drag-area"
                  : "drag-drop-zone"
              }
              onDrop={(e) => handleDrop(e)}
              onDragOver={(e) => handleDragOver(e)}
              onDragEnter={(e) => handleDragEnter(e)}
              onDragLeave={(e) => handleDragLeave(e)}
            >
              <p>Drag files here to upload</p>
            </div>
            <ol className="dropped-files">
              {data.fileList.map((f) => {
                return <li key={f.name}>{f.name}</li>;
              })}
            </ol>
            <button type="submit" className="btn btn-primary btn-block">
              Submit
            </button>
          </form>
        </div>
      </div>
    </div>
  );
};

export default DragAndDrop;
