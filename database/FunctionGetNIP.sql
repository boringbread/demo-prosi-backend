CREATE FUNCTION dbo.getNIP (@input VARCHAR(250))
RETURNS VARCHAR(250)
AS BEGIN
    DECLARE @Work VARCHAR(250)

    SET @Work = @Input

	select @Work=NIP from MtDosen where Nama like @Work 

	RETURN @Work

END



