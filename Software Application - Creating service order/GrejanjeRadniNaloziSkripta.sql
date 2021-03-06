USE [GrejanjeRadniNalozi]
GO
/****** Object:  StoredProcedure [dbo].[RadniNalogAdd]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP PROCEDURE [dbo].[RadniNalogAdd]
GO
/****** Object:  StoredProcedure [dbo].[RadAdd]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP PROCEDURE [dbo].[RadAdd]
GO
/****** Object:  StoredProcedure [dbo].[MaterijalAdd]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP PROCEDURE [dbo].[MaterijalAdd]
GO
/****** Object:  StoredProcedure [dbo].[KlijentSearch]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP PROCEDURE [dbo].[KlijentSearch]
GO
/****** Object:  StoredProcedure [dbo].[KlijentAdd]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP PROCEDURE [dbo].[KlijentAdd]
GO
/****** Object:  StoredProcedure [dbo].[AdresaAdd]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP PROCEDURE [dbo].[AdresaAdd]
GO
ALTER TABLE [dbo].[RadniNalog] DROP CONSTRAINT [FK__RadniNalog__Ime__2D27B809]
GO
ALTER TABLE [dbo].[RadniNalog] DROP CONSTRAINT [FK__RadniNalo__Adres__2E1BDC42]
GO
ALTER TABLE [dbo].[Klijent] DROP CONSTRAINT [FK__Klijent__Adresa__1DE57479]
GO
/****** Object:  Table [dbo].[TipRad]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP TABLE [dbo].[TipRad]
GO
/****** Object:  Table [dbo].[TipMaterijala]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP TABLE [dbo].[TipMaterijala]
GO
/****** Object:  Table [dbo].[RadniNalog]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP TABLE [dbo].[RadniNalog]
GO
/****** Object:  Table [dbo].[Klijent]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP TABLE [dbo].[Klijent]
GO
/****** Object:  Table [dbo].[Adresa]    Script Date: 6/19/2019 7:53:09 PM ******/
DROP TABLE [dbo].[Adresa]
GO
/****** Object:  Table [dbo].[Adresa]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Adresa](
	[AdresaID] [int] IDENTITY(1,1) NOT NULL,
	[Ulica] [varchar](20) NOT NULL,
	[Broj] [int] NOT NULL,
	[Grad] [varchar](20) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[AdresaID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Klijent]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Klijent](
	[KlijentID] [int] IDENTITY(1,1) NOT NULL,
	[Ime] [nvarchar](20) NOT NULL,
	[Prezime] [nvarchar](20) NOT NULL,
	[Telefon] [nvarchar](20) NOT NULL,
	[Email] [nvarchar](25) NOT NULL,
	[Adresa] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[KlijentID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[RadniNalog]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[RadniNalog](
	[RadniNalogID] [int] IDENTITY(1,1) NOT NULL,
	[Ime] [int] NOT NULL,
	[Adresa] [int] NOT NULL,
	[Cena] [int] NOT NULL,
	[Datum] [nvarchar](30) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[RadniNalogID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
/****** Object:  Table [dbo].[TipMaterijala]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[TipMaterijala](
	[TipMaterijalaID] [int] IDENTITY(1,1) NOT NULL,
	[NazivMaterijala] [varchar](20) NOT NULL,
	[CenaMaterijala] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[TipMaterijalaID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[TipRad]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[TipRad](
	[TipRadID] [int] IDENTITY(1,1) NOT NULL,
	[NazivRada] [varchar](20) NOT NULL,
	[CenaRada] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[TipRadID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[Adresa] ON 

INSERT [dbo].[Adresa] ([AdresaID], [Ulica], [Broj], [Grad]) VALUES (7, N'Ulica Breza', 9, N'Smederevo')
INSERT [dbo].[Adresa] ([AdresaID], [Ulica], [Broj], [Grad]) VALUES (8, N'Milosa obilica', 32, N'Smederevo')
INSERT [dbo].[Adresa] ([AdresaID], [Ulica], [Broj], [Grad]) VALUES (9, N'Zarka Vukovica', 38, N'Beograd')
INSERT [dbo].[Adresa] ([AdresaID], [Ulica], [Broj], [Grad]) VALUES (10, N'', 0, N'')
INSERT [dbo].[Adresa] ([AdresaID], [Ulica], [Broj], [Grad]) VALUES (11, N'Marine Ilica', 55, N'Budva')
INSERT [dbo].[Adresa] ([AdresaID], [Ulica], [Broj], [Grad]) VALUES (12, N'Milutina Milankovica', 2, N'Budva')
INSERT [dbo].[Adresa] ([AdresaID], [Ulica], [Broj], [Grad]) VALUES (13, N'Sasina', 1, N'Sasevac')
SET IDENTITY_INSERT [dbo].[Adresa] OFF
SET IDENTITY_INSERT [dbo].[Klijent] ON 

INSERT [dbo].[Klijent] ([KlijentID], [Ime], [Prezime], [Telefon], [Email], [Adresa]) VALUES (2, N'Nikola', N'Milojic', N'0691739700', N'mnikolasd@gmail.com', 7)
INSERT [dbo].[Klijent] ([KlijentID], [Ime], [Prezime], [Telefon], [Email], [Adresa]) VALUES (3, N'Bogdan', N'Bogdanovic', N'061674987297', N'bbogdanovic@gmail.com', 8)
INSERT [dbo].[Klijent] ([KlijentID], [Ime], [Prezime], [Telefon], [Email], [Adresa]) VALUES (4, N'petar', N'Petrovic', N'06332457482', N'ppetrovic@gmail.com', 9)
INSERT [dbo].[Klijent] ([KlijentID], [Ime], [Prezime], [Telefon], [Email], [Adresa]) VALUES (7, N'Jovana', N'Jovicic', N'0687756557', N'jocca.bd@gmail.com', 12)
INSERT [dbo].[Klijent] ([KlijentID], [Ime], [Prezime], [Telefon], [Email], [Adresa]) VALUES (8, N'Sasa', N'Sasic', N'066578948', N'ssasic@gmail.com', 13)
SET IDENTITY_INSERT [dbo].[Klijent] OFF
SET IDENTITY_INSERT [dbo].[RadniNalog] ON 

INSERT [dbo].[RadniNalog] ([RadniNalogID], [Ime], [Adresa], [Cena], [Datum]) VALUES (1, 2, 7, 500, N'Wednesday, June 19, 2019')
INSERT [dbo].[RadniNalog] ([RadniNalogID], [Ime], [Adresa], [Cena], [Datum]) VALUES (2, 7, 12, 350, N'Wednesday, June 19, 2019')
SET IDENTITY_INSERT [dbo].[RadniNalog] OFF
SET IDENTITY_INSERT [dbo].[TipMaterijala] ON 

INSERT [dbo].[TipMaterijala] ([TipMaterijalaID], [NazivMaterijala], [CenaMaterijala]) VALUES (1, N'Cevi za podno', 300)
INSERT [dbo].[TipMaterijala] ([TipMaterijalaID], [NazivMaterijala], [CenaMaterijala]) VALUES (2, N'Cevi za zidno', 200)
INSERT [dbo].[TipMaterijala] ([TipMaterijalaID], [NazivMaterijala], [CenaMaterijala]) VALUES (3, N'Radijator', 70)
INSERT [dbo].[TipMaterijala] ([TipMaterijalaID], [NazivMaterijala], [CenaMaterijala]) VALUES (4, N'Kotao', 1000)
INSERT [dbo].[TipMaterijala] ([TipMaterijalaID], [NazivMaterijala], [CenaMaterijala]) VALUES (5, N'Vazdusno', 250)
INSERT [dbo].[TipMaterijala] ([TipMaterijalaID], [NazivMaterijala], [CenaMaterijala]) VALUES (6, N'Solarno', 400)
INSERT [dbo].[TipMaterijala] ([TipMaterijalaID], [NazivMaterijala], [CenaMaterijala]) VALUES (7, N'Cvrsto gorivo', 30)
SET IDENTITY_INSERT [dbo].[TipMaterijala] OFF
SET IDENTITY_INSERT [dbo].[TipRad] ON 

INSERT [dbo].[TipRad] ([TipRadID], [NazivRada], [CenaRada]) VALUES (1, N'Zidno', 150)
INSERT [dbo].[TipRad] ([TipRadID], [NazivRada], [CenaRada]) VALUES (2, N'Podno', 200)
INSERT [dbo].[TipRad] ([TipRadID], [NazivRada], [CenaRada]) VALUES (3, N'Kotlarnica', 75)
INSERT [dbo].[TipRad] ([TipRadID], [NazivRada], [CenaRada]) VALUES (4, N'Vazdusno', 100)
INSERT [dbo].[TipRad] ([TipRadID], [NazivRada], [CenaRada]) VALUES (5, N'Solarno', 500)
SET IDENTITY_INSERT [dbo].[TipRad] OFF
ALTER TABLE [dbo].[Klijent]  WITH CHECK ADD FOREIGN KEY([Adresa])
REFERENCES [dbo].[Adresa] ([AdresaID])
GO
ALTER TABLE [dbo].[RadniNalog]  WITH CHECK ADD FOREIGN KEY([Adresa])
REFERENCES [dbo].[Adresa] ([AdresaID])
GO
ALTER TABLE [dbo].[RadniNalog]  WITH CHECK ADD FOREIGN KEY([Ime])
REFERENCES [dbo].[Klijent] ([KlijentID])
GO
/****** Object:  StoredProcedure [dbo].[AdresaAdd]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[AdresaAdd]
@ulica nvarchar(20), 
@broj int,
@grad nvarchar(20) 
as 
begin 
insert into Adresa (Ulica, Broj, Grad) 
values (@ulica, @broj, @grad) 
end 
GO
/****** Object:  StoredProcedure [dbo].[KlijentAdd]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[KlijentAdd] 
@ime varchar(20), 
@prezime varchar(20), 
@telefon varchar(20), 
@email varchar(20),
@ulica varchar(20)
as 
begin
declare @pom int;

set @pom = (SELECT AdresaID FROM Adresa WHERE Ulica = @ulica)

insert into Klijent (Ime, Prezime, Telefon, Email, Adresa) 
values (@ime, @prezime, @telefon, @email, @pom) 
 

end 
GO
/****** Object:  StoredProcedure [dbo].[KlijentSearch]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[KlijentSearch] 
@ime varchar(20) 
as 
begin 
select * from Klijent 
where @ime is NULL 
or Ime like (@ime + '%') 
or Prezime like (@ime + '%') 
or KlijentID like (@ime + '%') 
end 
GO
/****** Object:  StoredProcedure [dbo].[MaterijalAdd]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[MaterijalAdd] 
@naziv varchar(20), 
@cena int 
as 
begin 
insert into TipMaterijala (NazivMaterijala, CenaMaterijala) 
values (@naziv, @cena) 
end
GO
/****** Object:  StoredProcedure [dbo].[RadAdd]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
create procedure [dbo].[RadAdd] 
@naziv varchar(20), 
@cena int 
as 
begin 
insert into TipRad (NazivRada, CenaRada) 
values (@naziv, @cena) 
end
GO
/****** Object:  StoredProcedure [dbo].[RadniNalogAdd]    Script Date: 6/19/2019 7:53:09 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE procedure [dbo].[RadniNalogAdd] 
@ime int, 
@adresa int, 
@materijal int,
@rad int,
@datum nvarchar(30)
as 
begin 
declare @pom int; 
declare @pom1 int; 
declare @pom2 int;
set @pom1 = (select CenaRada from TipRad where TipRadID = @rad) 
set @pom2 = (select CenaMaterijala from TipMaterijala where TipMaterijalaID = @materijal) 
set @pom = (select SUM(@pom1 + @pom2)) 
insert into RadniNalog (Ime, Adresa, Cena, Datum) 
values (@ime, @adresa, @pom, @datum) 
end
GO
